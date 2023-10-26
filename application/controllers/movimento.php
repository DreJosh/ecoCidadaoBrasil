<?php
defined('BASEPATH') or exit('No direct script access allowed');

class movimento extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('V_movimento');
		$this->load->view('template/footer');

	}
}
