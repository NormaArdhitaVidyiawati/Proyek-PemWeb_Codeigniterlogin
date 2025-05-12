<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Test extends Controller {
    public function index() {
        $db = \Config\Database::connect();
        echo $db->getVersion();
    }
}