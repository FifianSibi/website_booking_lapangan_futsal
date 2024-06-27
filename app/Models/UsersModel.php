<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role', 'created_at'];

    // For any custom logic you might want
    public function getUserWithProfile($id)
    {
        return $this->where('users.id', $id)
            ->join('profiles', 'profiles.user_id = users.id')
            ->first();
    }

    // Function to register a new user
    public function register($data)
    {
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Set the created_at field
        $data['created_at'] = date('Y-m-d H:i:s');

        // Insert the data into the database
        return $this->insert($data);
    }
}
