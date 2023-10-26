<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restricts extends CI_Controller
{
    public function index()
    {
        $this->template->show("Login.php");
    }
}
