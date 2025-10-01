<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\EnrollmentModel; // ✅ tambahin
use App\Models\StudentModel;    // ✅ supaya bisa mapping user ke student

class Courses extends BaseController
{
    protected $courseModel;
    protected $enrollmentModel;
    protected $studentModel;

    public function __construct()
    {
        $this->courseModel     = new CourseModel();
        $this->enrollmentModel = new EnrollmentModel();
        $this->studentModel    = new StudentModel();
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $data = [
            'title'   => 'Daftar Courses',
            'courses' => $this->courseModel->findAll()
        ];

        return view('courses/index', $data);
    }

    // ✅ Student enroll ke course
    public function enroll($courseId)
    {
        if (session()->get('role') !== 'student') {
            return redirect()->to('/dashboard');
        }

        // cari student_id berdasarkan user_id dari session
        $userId = session()->get('id'); // biasanya "id" itu user_id
        $student = $this->studentModel->where('user_id', $userId)->first();

        if (!$student) {
            return redirect()->to('/courses')->with('error', 'Data student tidak ditemukan.');
        }

        $studentId = $student['id'];

        // cek apakah sudah pernah enroll
        $cek = $this->enrollmentModel
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->first();

        if ($cek) {
            return redirect()->to('/courses')->with('info', 'Sudah enroll di course ini.');
        }

        // simpan ke tabel enrollments
        $this->enrollmentModel->save([
            'student_id' => $studentId,
            'course_id'  => $courseId
        ]);

        return redirect()->to('/courses')->with('success', 'Berhasil enroll course!');
    }

  public function myCourses()
{
    if (!session()->get('isLoggedIn') || session()->get('role') !== 'student') {
        return redirect()->to('/login');
    }

    // ambil user_id dari session
    $userId = session()->get('id'); 

    // mapping ke student_id
    $student = $this->studentModel->where('user_id', $userId)->first();

    if (!$student) {
        return redirect()->to('/dashboard')->with('error', 'Data student tidak ditemukan.');
    }

    $studentId = $student['id'];

    // ambil daftar kelas yang sudah dienroll
    $db = \Config\Database::connect();
    $builder = $db->table('enrollments')
        ->select('courses.id, courses.course_name, courses.description')
        ->join('courses', 'courses.id = enrollments.course_id')
        ->where('enrollments.student_id', $studentId);

    $data['courses'] = $builder->get()->getResultArray();

    return view('courses/my_courses', $data);
}


    // Admin CRUD
    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        return view('courses/create');
    }

    public function store()
    {
        $this->courseModel->save([
            'course_name' => $this->request->getPost('course_name'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/courses')->with('success', 'Course berhasil ditambahkan!');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $this->courseModel->delete($id);
        return redirect()->to('/courses')->with('success', 'Course berhasil dihapus!');
    }
  
}

