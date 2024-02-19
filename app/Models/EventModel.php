<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table      = 'event';
    protected $primaryKey = 'id';

    protected $allowedFields = ['judul','gambar'];
}