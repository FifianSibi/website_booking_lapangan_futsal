<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LapanganModel;

class LapanganController extends BaseController
{
    public function index()
    {
        $lapanganModel = new LapanganModel();
        $fields = $lapanganModel->getAllFields();

        $data = [
            'fields' => $fields
        ];

        return view('pelanggan/lapangan', $data);
    }
    public function adminindex()
    {
        $lapanganModel = new LapanganModel();
        $fields = $lapanganModel->getAllFields();

        $data = [
            'fields' => $fields
        ];

        return view('admin/adminlapangan', $data);
    }

    public function create()
    {
        return view('pelanggan/create');
    }

    public function store()
    {
        $request = service('request');
        $lapanganModel = new LapanganModel();

        // Mengambil file foto yang diunggah
        $foto = $request->getFile('foto');

        // Memeriksa apakah ada file yang diunggah
        if ($foto && $foto->isValid() && $foto->move(ROOTPATH . 'public/uploads', $foto->getName())) {
            // Data untuk disimpan ke database
            $data = [
                'name' => $request->getPost('name'),
                'description' => $request->getPost('description'),
                'location' => $request->getPost('location'),
                'price_per_hour' => $request->getPost('price_per_hour'),
                'foto' => $foto->getName(), // Simpan nama file foto
                'created_at' => date('Y-m-d H:i:s')
            ];

            // Simpan data ke database
            $lapanganModel->addField($data);

            // Redirect ke halaman index
            return redirect()->to('/adminlapangan');
        } else {
            // Jika gagal mengunggah foto, kembalikan ke halaman tambah dengan pesan error
            session()->setFlashdata('error', 'Failed to upload photo.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $lapanganModel = new LapanganModel();
        $field = $lapanganModel->getFieldById($id);

        if (!$field) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'field' => $field
        ];

        return view('pelanggan/edit', $data);
    }

    public function update()
    {
        $request = service('request');
        $lapanganModel = new LapanganModel();

        // Mendapatkan ID lapangan dari form
        $id = $request->getPost('id');

        // Mengambil data lapangan berdasarkan ID
        $field = $lapanganModel->getFieldById($id);

        // Jika data lapangan tidak ditemukan
        if (!$field) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Mengambil file foto yang diunggah
        $foto = $request->getFile('foto');

        // Memeriksa apakah ada file foto yang diunggah
        if ($foto && $foto->isValid()) {
            // Pindahkan file foto ke folder uploads
            $foto->move(ROOTPATH . 'public/uploads', $foto->getName());
            $fotoName = $foto->getName();
        } else {
            // Jika tidak ada file foto yang diunggah, gunakan foto yang sudah ada
            $fotoName = $field['foto'];
        }

        // Data untuk diupdate
        $data = [
            'name' => $request->getPost('name'),
            'description' => $request->getPost('description'),
            'location' => $request->getPost('location'),
            'price_per_hour' => $request->getPost('price_per_hour'),
            'foto' => $fotoName, // Simpan nama file foto
        ];

        // Update data lapangan
        $lapanganModel->update($id, $data);

        // Redirect ke halaman index
        return redirect()->to('/adminlapangan');
    }

    public function delete($id)
    {
        $lapanganModel = new LapanganModel();
        $lapanganModel->deleteField($id);

        // Redirect ke halaman index
        return redirect()->to('/adminlapangan');
    }
}
