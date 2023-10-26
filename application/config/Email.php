<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

//PRODUCAO
// $config['charset'] = 'utf-8';
// $config['protocol'] = 'email';
// $config['mailtype'] = 'html';
// $config['wordwrap'] = TRUE;
// $config['protocol']  = 'smtp';
// $config['smtp_host'] = '192.168.1.38';

//DESENVOLVIMENTO
$config['smtp_host'] = 'smtp.outlook.com';
$config['smtp_port'] = 587;
$config['smtp_user'] = 'ecocidadaobrasil@outlook.com';
$config['smtp_pass'] = 'Grupo042020';
$config['protocol']  = 'smtp';
$config['validate']  = TRUE;
$config['mailtype']  = 'html';
$config['charset']   = 'utf-8';
//$config['charset'] = 'iso-8859-1';
$config['newline']   = "\r\n";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
