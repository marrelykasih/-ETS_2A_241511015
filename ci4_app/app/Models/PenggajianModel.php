<?php
namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table      = 'penggajian';
    protected $primaryKey = false; // karena relasi gabungan

    protected $allowedFields = [
        'id_komponen_gaji',
        'id_anggota'
    ];
}

