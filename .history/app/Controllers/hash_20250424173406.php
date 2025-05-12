<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Hash extends Controller {
    public function index() {
        echo password_hash('password_anda', PASSWORD_DEFAULT);
    }
}