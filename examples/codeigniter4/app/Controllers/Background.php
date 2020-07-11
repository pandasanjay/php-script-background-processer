<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Background extends Controller
{

    public function run($to = 'World')
    {
        echo "Hello I am a background process {$to}!" . PHP_EOL;
    }
}
