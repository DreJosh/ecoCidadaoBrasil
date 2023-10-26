<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pagina extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('V_pagina');
		$this->load->view('template/footer');

	}
}
