<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanResepModel extends Model
{
    protected $table      = 'bahan_resep';
    protected $primaryKey = 'id_bahan_resep';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_resep','nama_bahan'];
}