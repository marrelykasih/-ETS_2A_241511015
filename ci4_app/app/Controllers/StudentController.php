<?php
namespace App\Controllers;
use App\Models\StudentModel;

class StudentController extends BaseController
{
    protected $studentModel;

    public function __construct()
    {
        $this->studentModel = new StudentModel();
    }

    // Tampilkan semua student
    public function index()
    {
        $data['students'] = $this->studentModel->findAll();
        return view('students/index', $data);
    }

    // Form tambah student
    public function create()
    {
        return view('students/create');
    }

    // Simpan student baru
    public function store()
    {
        $this->studentModel->save([
            'name'       => $this->request->getPost('name'),
            'username'   => $this->request->getPost('username'),
            'entry_year' => $this->request->getPost('entry_year'),
        ]);

        return redirect()->to('/students');
    }

    // Hapus student
    public function delete($id)
    {
        $this->studentModel->delete($id);
        return redirect()->to('/students');
    }
}
