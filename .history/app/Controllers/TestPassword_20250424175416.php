<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class TestPassword extends Controller {
    public function index() {
        $storedHash = '$2y$10$sOzrig.M/l3Qhb6uclN8he4VBPNtr0KeDRFsQBNCVMpiGFfOrljWO';
        $inputPassword = 'password_anda'; // Ganti dengan password yang Anda coba
        if (password_verify($inputPassword, $storedHash)) {
            echo "Password cocok!";
        } else {
            echo "Password tidak cocok.";
        }
    }
}