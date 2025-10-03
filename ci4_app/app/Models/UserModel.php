<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table         = 'pengguna';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['id_pengguna', 'username', 'password', 'email', 'nama_depan', 'nama_belakang'];
}
