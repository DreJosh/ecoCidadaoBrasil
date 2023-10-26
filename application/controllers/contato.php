<?php
defined('BASEPATH') or exit('No direct script access allowed');

class contato extends CI_Controller
{
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('V_contato');
		$this->load->view('template/footer');
	}

	public function enviarEmail()
	{
		$var = $this->input->post();

		$email = $var['email'];
		$assunto = $var['assunto'];
		$mensagem = $var['mensagem'];
		$telefone = $var['telefone'];
		$nome = $var['nome'];
		$data = $var['data'];
		$this->load->library('phpmailer_lib');


		// FUNÇÃO PARA CARREGAR AS CONFIGURAÇÕES DO E-MAIL
		$mail = $this->phpmailer_lib->load();

		// CONFIGURAÇÃO SMTP
		$mail->isSMTP();
		$mail->SMTPDebug = 0;        // DEBUGAR: 1 = ERROS E MENSAGENS, 2 = MENSAGENS APENAS
		$mail->Host = 'smtp.office365.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'ecocidadaobrasil@outlook.com';
		$mail->Password = 'Grupo042020';
		$mail->SMTPSecure = 'tls';
		$mail->Port     = 587;

		// E-MAIL RESPONSÁVEL
		$mail->setFrom('ecocidadaobrasil@outlook.com', 'Mail');

		// ADICIONAR UM DESTINATÁRIO
		$mail->addAddress('andre.ferreira@cinpal.com', 'Mail');

		// ASSUNTO DO E-MAIL
		$mail->Subject = utf8_decode('Eco Cidadão Brasil');

		// DEFINA O FORMATO DO E-MAIL PARA HTML
		$mail->isHTML(true);
		$mailContent = '<!DOCTYPE html>
		<html lang="pt-br">
		
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>layout email</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
				integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		</head>
		
		<body>
			<div class="container-fluid mt-5">
				<div class="card border border-success">
					<div class="card-header bg-success text-white">
						<h3>Comunicado sobre o meio ambiente.</h3>
					</div>
					<div class="card-body">
						Boa tarde, sou <b>' . $nome . '</b><br />
						No dia <b>' . $data . '</b><br />
						<pre>' . $mensagem . '</pre><br />
						E-mail: <b>' . $email . '</b> - Telefone: <b>' . $telefone . '</b><br />
					</div>
				</div>
			</div>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
				crossorigin="anonymous"></script>
		</body>
		
		</html>';

		$mail->Body = utf8_decode($mailContent);

		// ENVIO DO E-MAIL
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo '1';
		}
		exit;
	}
}
