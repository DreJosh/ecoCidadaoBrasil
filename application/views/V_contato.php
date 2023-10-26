<section class="page-section bg-primary" id="contact">
	<div class="container" style=" font-family: sans-serif; color:white;">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<h2 class="text-white mt-0">Mande um email, ajude nossa cidade.</h2>
			</div>
		</div>
		<form>
			<div class="Aviso">
				<div class="row">
					<div class="form-group col-sm-12 col-md-6">
						<label for="inpNome">Nome:</label>
						<input class="form-control" type="text" id="inpNome" name="inpNome">
					</div>
					<div class="form-group  col-sm-12 col-md-6">
						<label for="inpEmail">E-mail:</label>
						<input class="form-control" type="email" id="inpEmail" name="inpEmail">
					</div>
					<div class="form-group col-sm-12 col-md-6 ">
						<label for="inpTelefon">Telefone:</label>
						<input class="form-control" type="tel" id="inpTelefon" name="inpTelefon" onkeypress="return /[0-9 ]/i.test(event.key)" maxlength="11">
						<small id="helpTelefone" class="form-text text-warning">Por favor, colocar prefixo da cidade junto.</small>
					</div>
					<div class="form-group col-sm-12 col-md-6 ">
						<label for="inpImagem">Data do ocorrido:</label>
						<input type="datetime-local" class="form-control" id="inpData" name="inpData">
					</div>
					<div class="form-group col-12">
						<label for="Assunto">Assunto:</label>
						<input type="text" id="Assunto" name="Assunto" class="form-control">
					</div>
					<div class="form-group col-12">
						<label for="tarMensagem">Mensagem</label>
						<textarea class="form-control" id="tarMensagem" name="tarMensagem" maxlength="5000" rows="7"></textarea>
						<small id="helpMensagem" class="form-text text-warning">Se por um acaso quiser mandar uma imagem, favor mandar em um link.</small>
					</div>
				</div>

				<div class="form-group">
					<center>
						<button type="button" class="btn btn-warning" onclick="enviaEmail()">Enviar</button>
					</center>
				</div>

			</div>
		</form>

	</div>
</section>



<!-- Contact-->
<section class="page-section" id="contact">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<h2 class="mt-0">CONTATO</h2>
				<hr class="divider my-4" />
				<p class="text-muted mb-5">Para denuncia nos contate</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
				<i class="fas fa-phone fa-3x mb-3 text-muted"></i>
				<div>+55 11 4137-8329</div>
			</div>
			<div class="col-lg-4 mr-auto text-center">
				<i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
				<a class="d-block" href="mailto:ecocidadaobrasil@outlook.com">ecocidadaobrasil@outlook.com</a>
			</div>
		</div>
	</div>
</section>


<script>
	function enviaEmail() {
		var dados = {
			nome: $("#inpNome").val(),
			email: $("#inpEmail").val(),
			telefone: $("#inpTelefon").val(),
			assunto: $("#Assunto").val(),
			mensagem: $("#tarMensagem").val(),
			data: $("#inpData").val(),
		}
		console.log(dados);
		$.ajax({
			url: "http://localhost/ecoCidadaoBrasil/contato/enviarEmail",
			data: dados,
			type: 'POST',
			dataType: "json",
			error: function(retorno) {
				console.log(retorno);
				alert("Erro ao enviar!!");
			},
			beforeSend: function() {
				console.log('Carregando...')
			},
			success: function(retorno) {
				if (retorno == '1') {
					alert("E-mail enviado com sucesso.")
				} else {
					console.log(retorno);
				}

			}

		})


	}
</script>