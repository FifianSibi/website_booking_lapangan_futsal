<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $profileModel = new ProfileModel();

        // Misalnya user ID diambil dari sesi
        $userId = session()->get('user_id');

        // Mendapatkan data profil
        $profile = $profileModel->getProfileByUserId($userId);

        // Mengirim data profil ke view
        return view('pelanggan/profile', ['profile' => $profile]);
    }

    public function adminindex()
    {
        $profileModel = new ProfileModel();
        $profiles = $profileModel->getAllProfiles();

        return view('admin/adminprofile', ['profiles' => $profiles]);
    }

    public function saveProfile()
    {
        $profileModel = new ProfileModel();

        // Mendapatkan user ID dari sesi
        $userId = session()->get('user_id');

        // Mengambil data dari request
        $data = [
            'user_id' => $userId,
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address'),
        ];

        // Mengelola upload foto
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
            $data['foto'] = $fileName;
        }

        // Memeriksa apakah profil sudah ada
        $existingProfile = $profileModel->getProfileByUserId($userId);
        if ($existingProfile) {
            // Update data
            $profileModel->update($existingProfile['id'], $data);
        } else {
            // Insert data baru
            $profileModel->insert($data);
        }

        return redirect()->to('/profile');
    }
    public function deleteProfile($id)
    {
        $profileModel = new ProfileModel();

        // Mengambil profil berdasarkan ID
        $profile = $profileModel->find($id);

        if ($profile) {
            // Hapus foto dari folder uploads jika ada
            if ($profile['foto'] && file_exists('uploads/' . $profile['foto'])) {
                unlink('uploads/' . $profile['foto']);
            }

            // Hapus profil dari database
            $profileModel->delete($id);
        }

        return redirect()->to('/adminprofile');
    }
}
