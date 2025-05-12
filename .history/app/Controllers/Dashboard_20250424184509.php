<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller {
    public function index() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }
        echo "<pre>";
        echo "Session Data: ";
        var_dump(session()->get());
        echo "</pre>";
        return view('dashboard');
    }
}