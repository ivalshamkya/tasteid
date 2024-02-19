<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarkModel extends Model
{
    protected $table      = 'bookmark';
    protected $primaryKey = 'id_bookmark';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['user_id','id_resep'];
}