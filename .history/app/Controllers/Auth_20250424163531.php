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
}