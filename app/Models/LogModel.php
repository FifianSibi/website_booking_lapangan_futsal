<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'login_time', 'logout_time'];
}
