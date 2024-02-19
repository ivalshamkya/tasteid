<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kategori','kategori','status'];
    
}