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
		$var = array($this->input->post());

		$email = $var[0]['email'];
		$assunto = $var[0]['assunto'];
		$mensagem = $var[0]['mensagem'];
		$telefone = $var[0]['telefone'];
		$nome = $var[0]['nome'];
		$data = $var[0]['data'];
		$this->load->library('phpmailer_lib');

		$mail = $this->phpmailer_lib->load();
		$mail->ClearAddresses();
		$mail->clearAttachments();

		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Host      = 'smtp-mail.outlook.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'ecocidadaobrasil@outlook.com';
		$mail->Password = 'Grupo042020';
		$mail->SMTPSecure = 'tls';
		$mail->PORT = 587;

		$mail->setFrom('ecocidadaobrasil@outlook.com', 'Mail');
		$mail->addAddress('andre.ferreira@cinpal.com', 'SD001');
		$mail->Subjet = $assunto;
		$mail->isHTML(true);

		$mailContent = '<!DOCTYPE html>
		<html lang="pt-br">
		
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=" utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<style type="text/css">
		
			</style>
		</head>
		
		<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
			<center>
				<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
					<tr>
						<td align="center" valign="top" id="bodyCell">
							<table border="0" cellpadding="0" cellspacing="0" id="templateContainer">
								<tr>
									<td align="center" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader">
											<tr>
												<td valign="top" class="headerContent">
													<h1></h1>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td align="center" valign="top">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody">
											<tr>
												<td valign="top" class="bodyContent">
													<!-- message header end -->
													<table
														style="font-family: Verdana, sans-serif; font-size: 14px; color: #000000; text-decoration: none; width: 596px;"
														border="0" cellspacing="0" cellpadding="8">
														<tbody>
															<tr>
																<td width="657">
																	<p style="text-align: left;">
																	<table style="border: 2px solid rgb(0, 51, 0); width: 100%;"
																		border="0" cellspacing="5" cellpadding="5"
																		align="center">
																		<tbody>
																			<tr class="tabela">
																				<td
																					style="background-color: rgb(0, 102, 0); color: white; padding-left: 15px;">
																					<strong>Comunicado sobre o meio
																						ambiente.</strong>
																				</td>
																			</tr>
																			<tr class="tabela">
																				<td>Boa tarde, sou ' . $nome . '<br />
																					No dia ' . $data . '<br />
																					' . $mensagem . '<br />
																					E-mail: ' . $email . ' - Telefone: ' . $telefone . '
																				</td>
																			</tr>
																			<tr style="border:white;"></tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</center>
		</body>
		
		</html>';
		$mail->Body = $mailContent;

		if (!$mail->send()) {
			echo 'Mensagem não enviada</br>';
			echo 'Erro: ' . $mail->ErrorInfo;
		} else {
			$msg =  array(
				"cod" => 1,
				"mensagens" => "Email enviado com sucesso"
			);
			echo json_encode($msg);
		}
	}
}
