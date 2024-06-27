<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\LogModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
        helper(['form']); // Load form helper
    }

    public function index()
    {
        return view('auth/index');
    }

    public function login()
    {
        $model = new UsersModel();
        $logModel = new LogModel();

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('auth/index', ['validation' => $validation, 'form_type' => 'login']);
        }

        // Check user credentials
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $this->session->set([
                'user_id' => $user['id'],
                'logged_in' => TRUE
            ]);

            // Log login time
            $logModel->save([
                'user_id' => $user['id'],
                'login_time' => date('Y-m-d H:i:s')
            ]);

            // Redirect to dashboard based on role
            if ($user['role'] == 'administrator') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/dashboard');
            }
        }

        return view('auth/index', ['error' => 'Invalid username or password.', 'form_type' => 'login']);
    }

    public function logout()
    {
        $logModel = new LogModel();

        // Log logout time
        if ($this->session->get('user_id')) {
            $logModel->where('user_id', $this->session->get('user_id'))
                ->where('logout_time', null)
                ->set('logout_time', date('Y-m-d H:i:s'))
                ->update();
        }

        // Destroy session
        $this->session->destroy();

        return redirect()->to('/auth');
    }

    public function register()
    {
        $model = new UsersModel();

        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'password_confirm' => 'required|matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('auth/index', ['validation' => $validation, 'form_type' => 'register']);
        }

        $password = $this->request->getPost('password');

        if (!is_string($password)) {
            return view('auth/index', ['error' => 'Password must be a string.', 'form_type' => 'register']);
        }

        // Insert new user
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user', // Default role for new users
        ];

        if ($model->insert($data)) {
            return redirect()->to('/')->with('success', 'Registration successful. You can now login.');
        } else {
            return view('auth/index', ['error' => 'Registration failed. Please try again.', 'form_type' => 'register']);
        }
    }
}
