<?php

class Background extends CI_Controller
{

    public function run($to = 'World')
    {
        echo "Hello I am a background process {$to}!" . PHP_EOL;
    }
}
