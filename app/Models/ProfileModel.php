<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'foto',
        'created_at'
    ];

    // Fungsi untuk mendapatkan profil berdasarkan user_id
    public function getProfileByUserId($userId)
    {
        // Menggunakan where untuk mencari profil berdasarkan user_id
        return $this->where('user_id', $userId)->first();
    }

    // Fungsi untuk menyimpan atau memperbarui data profil
    public function saveProfile($data)
    {
        // Mencari profil yang sudah ada berdasarkan user_id
        $existingProfile = $this->where('user_id', $data['user_id'])->first();

        if ($existingProfile) {
            // Update data jika profil sudah ada
            return $this->update($existingProfile['id'], $data);
        } else {
            // Insert data baru jika profil belum ada
            return $this->insert($data);
        }
    }

    public function deleteProfile($id)
    {
        // Menghapus data profil dari database
        return $this->delete($id);
    }

    // Fungsi untuk mendapatkan semua data profil
    public function getAllProfiles()
    {
        // Mengambil semua data dari tabel profiles
        return $this->findAll();
    }
}
