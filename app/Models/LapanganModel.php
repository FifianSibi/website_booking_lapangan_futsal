<?php

namespace App\Models;

use CodeIgniter\Model;

class LapanganModel extends Model
{
    protected $table = 'fields';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'description',
        'location',
        'price_per_hour',
        'foto',
        'created_at'
    ];

    public function getAllFields()
    {
        return $this->findAll();
    }

    public function addField($data)
    {
        return $this->insert($data);
    }

    public function getFieldById($id)
    {
        return $this->find($id);
    }

    public function updateField($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteField($id)
    {
        return $this->delete($id);
    }
}
