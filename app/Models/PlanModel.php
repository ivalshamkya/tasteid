<?php

namespace App\Models;

use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table      = 'rencana_memasak';
    protected $primaryKey = 'id_rencana_memasak';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_resep','user_id','hari','waktu'];
}