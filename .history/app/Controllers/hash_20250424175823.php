<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Hash extends Controller {
    public function index() {
        echo password_hash('kata_sandi_baru', PASSWORD_DEFAULT); // Ganti dengan password baru
    }
}