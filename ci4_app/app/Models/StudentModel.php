<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table         = 'students';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['user_id', 'entry_year'];

    /**
     * Ambil semua data students dengan join ke tabel users
     */
    public function getAllStudents()
    {
        return $this->select('
                        students.id        AS student_id,
                        students.user_id,
                        students.entry_year,
                        users.fullname,
                        users.username,
                       
                    ')
                    ->join('users', 'users.id = students.user_id')
                    ->findAll();
    }

    /**
     * Ambil data student by ID dengan join users
     */
    public function getStudent($id)
    {
        return $this->select('
                        students.id        AS student_id,
                        students.user_id,
                        students.entry_year,
                        users.fullname,
                        users.username,
                      
                    ')
                    ->join('users', 'users.id = students.user_id')
                    ->where('students.id', $id)
                    ->first();
    }
}
