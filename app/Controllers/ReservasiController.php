<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;

class ReservasiController extends BaseController
{
    public function index()
    {
        $reservasiModel = new ReservasiModel();
        $userId = session()->get('user_id'); // Assuming user ID is stored in session
        $reservations = $reservasiModel->where('user_id', $userId)->findAll();

        return view('pelanggan/reservasi', ['reservations' => $reservations]);
    }

    public function adminindex()
    {
        $reservasiModel = new ReservasiModel();
        $reservations['reservations'] = $reservasiModel->getAllData();

        return view('admin/adminreservasi', $reservations);
    }

    public function store()
    {
        $data = [
            'field_id' => $this->request->getPost('field_id'),
            'user_id' => $this->request->getPost('user_id'),
            'reservation_date' => $this->request->getPost('reservation_date'),
            'start_time' => $this->request->getPost('start_time'),
            'end_time' => $this->request->getPost('end_time'),
        ];

        $reservasiModel = new ReservasiModel();
        $reservasiModel->insert($data);
        return redirect()->to('/lapangan');
    }

    public function confirm($id)
    {
        $reservasiModel = new ReservasiModel();
        $reservasiModel->update($id, ['status' => 'confirmed']);
        return redirect()->to('/adminreservasi');
    }

    public function cancel($id)
    {
        $reservasiModel = new ReservasiModel();
        $reservasiModel->update($id, ['status' => 'cancelled']);
        return redirect()->to('/adminreservasi');
    }
}
