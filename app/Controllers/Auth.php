<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller {
    public function login() {
        return view('auth/login');
    }

    public function attempt() {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $model->getUser($username);

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Username atau password salah');
            return redirect()->back();
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function register() {
        return view('auth/register');
    }

    public function store() {
        $session = session();
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        // Validasi sederhana
        if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
            $session->setFlashdata('error', 'Semua kolom harus diisi');
            return redirect()->back();
        }

        // Cek duplikasi username atau email
        if ($model->where('username', $data['username'])->first()) {
            $session->setFlashdata('error', 'Username sudah digunakan');
            return redirect()->back();
        }
        if ($model->where('email', $data['email'])->first()) {
            $session->setFlashdata('error', 'Email sudah digunakan');
            return redirect()->back();
        }

        // Simpan data
        if ($model->save($data)) {
            $session->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
            return redirect()->to('/auth/login');
        } else {
            $session->setFlashdata('error', 'Registrasi gagal. Coba lagi.');
            return redirect()->back();
        }
    }
}