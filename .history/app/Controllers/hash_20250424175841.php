<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Hash extends Controller {
    public function index() {
        echo password_hash('$2y$10$sOzrig.M/l3Qhb6uclN8he4VBPNtr0KeDRFsQBNCVMpiGFfOrljWO', PASSWORD_DEFAULT); // Ganti dengan password baru
    }
}