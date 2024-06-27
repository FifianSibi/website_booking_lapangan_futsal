<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['field_id', 'user_id', 'reservation_date', 'start_time', 'end_time', 'status'];

    public function getAllData()
    {
        return $this->findAll();
    }
}
