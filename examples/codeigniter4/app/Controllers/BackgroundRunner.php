<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\BackgroundProcess;

class BackgroundRunner extends Controller
{
    public function index()
    {
        $proc = new BackgroundProcess("curl -s -o " . $_SERVER['DOCUMENT_ROOT'] . "/page_control/log/log_background_process.log " . base_url('background/run'));

        $pid = $proc->getProcessId();
        echo $pid . "\n";
    }
}
