<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table      = 'penggajian';
    protected $primaryKey = null; 
    protected $allowedFields = ['id_anggota', 'id_komponen_gaji'];
}
