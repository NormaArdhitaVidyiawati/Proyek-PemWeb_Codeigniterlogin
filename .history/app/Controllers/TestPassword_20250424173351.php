<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class TestPassword extends Controller {
    public function index() {
        $storedHash = 'HASH_DARI_DATABASE'; // Ganti dengan hash dari tabel users
        $inputPassword = 'password_anda'; // Ganti dengan password yang Anda coba
        if (password_verify($inputPassword, $storedHash)) {
            echo "Password cocok!";
        } else {
            echo "Password tidak cocok.";
        }
    }
}