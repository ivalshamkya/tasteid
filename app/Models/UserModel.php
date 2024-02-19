<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';

    protected $allowedFields = [
    'user_id',
    'nama_user',
    'email_user',
    'password_user',
    'provinsi',
    'kota',
    'img_user',
    'hak_akses'];
}