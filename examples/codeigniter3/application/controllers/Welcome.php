<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function background()
	{
		$this->load->library('backgroundprocess');
		$this->backgroundprocess->setCmd("curl -o /www/application/logs/log_background_process.log " . base_url('index.php/background/run'));
		//Please don't use "true" argument in a production, This will fill your storage if you not clean all the logs.
		$this->backgroundprocess->start(true);
		$pid = $this->backgroundprocess->getProcessId();
		echo $this->backgroundprocess->get_log_paths();
		echo $pid . "\n";
	}
}
