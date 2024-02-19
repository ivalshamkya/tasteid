<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanUtamaModel extends Model
{
    protected $table      = 'bahan_utama';
    protected $primaryKey = 'id_bahan_utama';

    protected $useAutoIncrement = true;
}