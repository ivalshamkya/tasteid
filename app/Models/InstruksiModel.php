<?php

namespace App\Models;

use CodeIgniter\Model;

class InstruksiModel extends Model
{
    protected $table      = 'instruksi';
    protected $primaryKey = 'id_instruksi';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_resep','detail_instruksi','gambar'];
}