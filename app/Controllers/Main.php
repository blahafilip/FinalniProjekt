<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    public function index()
    {
        echo view("uvodniStranka");
    }
    public function zavody()
    {
        
    }
}
