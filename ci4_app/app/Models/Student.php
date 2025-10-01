<?php namespace App\Models;

use CodeIgniter\Model;

class Student extends Model {
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'name',
        'email',
        'password',
        'role',
        'entry_year',
        'enrolled_courses'
    ];
}
