<?php

namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model
{
    protected $table      = 'resep';
    protected $primaryKey = 'id_resep';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_resep','id_user','id_kategori','detail_resep','gambar_resep'];
}