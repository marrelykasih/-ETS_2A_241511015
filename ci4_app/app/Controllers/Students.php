<?php
namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;

class Students extends BaseController
{
    protected $studentModel;
    protected $userModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
        $this->userModel    = new UserModel();
    }

    // Daftar semua students
    public function index()
    {
        $data['students'] = $this->studentModel->getAllStudents();
        return view('students/index', $data);
    }

    // Form tambah student
    public function create()
    {
        return view('students/create');
    }

    // Simpan data student + user
    public function store()
    {
        // simpan ke tabel users
        $userId = $this->userModel->insert([
            'fullname' => $this->request->getPost('full_name'), // <- konsisten
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'student'
        ]);

        // simpan ke tabel students
        $this->studentModel->insert([
            'user_id'    => $userId,
            'entry_year' => $this->request->getPost('entry_year'),
            'email'      => $this->request->getPost('email'),
        ]);

        return redirect()->to('/students')->with('success', 'Student berhasil ditambahkan');
    }

    // Form edit student
    public function edit($id)
    {
        $data['student'] = $this->studentModel->getStudent($id);
        return view('students/edit', $data);
    }

    // Update data student + user
    public function update($id)
    {
        $student = $this->studentModel->getStudent($id);

        // update users
        $dataUser = [
            'fullname' => $this->request->getPost('full_name'), // <- konsisten
            'username' => $this->request->getPost('username'),
        ];

        // jika admin isi password baru
        if ($this->request->getPost('password')) {
            $dataUser['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->userModel->update($student['user_id'], $dataUser);

        // update students
        $this->studentModel->update($id, [
            'entry_year' => $this->request->getPost('entry_year'),
            'email'      => $this->request->getPost('email'),
        ]);

        return redirect()->to('/students')->with('success', 'Data student berhasil diupdate');
    }

    // Hapus student + user terkait
    public function delete($id)
    {
        $student = $this->studentModel->getStudent($id);

        if ($student) {
            $this->studentModel->delete($id);              // hapus students
            $this->userModel->delete($student['user_id']); // hapus users
        }

        return redirect()->to('/students')->with('success', 'Data student berhasil dihapus');
    }
}
