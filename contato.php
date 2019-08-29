<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-6 col-xs-12">
				
				<?php
					if (isset($_POST['enviar'])) {
						$nome = antiInject($_POST['nome']);
						$email = antiInject($_POST['email']);
						$telefone = antiInject($_POST['telefone']);
						$mensagem = antiInject($_POST['mensagem']);

						if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
							echo "<script> alert('Preencher os campos corretamente antes de enviar o email!') </script>";
						} else {

							$para = "redefemininacorumba@redefemininacorumba.com.br";

							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								echo "<script> alert('Email inválido!') </script>";
							} else {

								//Chave secreta
								$secret = "6LcU9xwTAAAAAEsKHMzW1dRwItP5i4us6zEW5TAm";
								//Resposta Vazia
								$response = null;
								// verifique a chave secreta
								$reCaptcha = new ReCaptcha($secret);
								// se submetido, verifique a resposta
								if ($_POST["g-recaptcha-response"]) {
									$response = $reCaptcha->verifyResponse(
											$_SERVER["REMOTE_ADDR"],
											$_POST["g-recaptcha-response"]
									);
								}

								if ($response != null && $response->success) {
									$headers = "From: $email\r\n" .
											"Name: $nome\r\n" .
											"Reply-To: $email\r\n" .
											"X-Mailer: PHP/" . phpversion() . "\r\n";
									$headers .= "MIME-Version: 1.0\r\n";
									$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
									$subject = $nome . ' / ' . $telefone;
									mail($para, $subject, nl2br($mensagem), $headers);
									echo "<script> alert('Email enviado com sucesso!') </script>";
								} else {
									echo "<script> alert('Não foi possivel enviar o email!') </script>";
								}

							}
						}
					}
				?>

				<form action="" method="POST" style="margin-top: 10%;">
				  
				  	<div class="form-group col-md-11">
				    	<input type="text" class="form-control formulario" pattern="[a-zA-Zà-úÀ-Ú\s]+$" title="Não são permitidos símbolos e números"
						   name="nome" placeholder="Nome" required >
				  	</div>
				  
				  	<div class="form-group col-md-11">
				    	<input type="email" class="form-control formulario" name="email" placeholder="Email" required>
				  	</div>
				  
				  	<div class="form-group col-md-11">
				    	<input type="tel" class="form-control formulario" id="telefone" name="telefone" placeholder="Telefone" required>
				  	</div>

				  	<div class="form-group col-md-11">
				  		<textarea class="form-control" rows="3" name="mensagem" placeholder="Mensagem" required></textarea>
				  	</div>

					<div class="col-md-11">
						<div class="g-recaptcha" data-sitekey="6LcU9xwTAAAAANGXFF5GjGgJTJiR-Bze9qz6Bd-U"></div>
					</div>

				 	<div class="col-md-11">
				  		<input type="submit" class="btn btn-primary btn-enviar" name="enviar" value="ENVIAR">
				  	</div>

				</form>
				
			</div>

			<div class="col-md-6 col-xs-12">

				<h3> Rede Feminina de Combate ao Câncer </h3>
				<i class="fa fa-home fa-2x" aria-hidden="true"> </i> 15 de Novembro Nº 1199 <br> <br>

				<i class="fa fa-phone fa-2x" aria-hidden="true"> </i> (67) 3231-3057 <br> <br>

				<i class="fa fa-envelope fa-2x" aria-hidden="true"> </i> redefemininacorumba@hotmail.com <br> <br>

				<h4> Compartilhe </h4>

				<span class="redesocial">
					<a href="https://www.facebook.com/Rede-Feminina-De-Combate-Ao-C%C3%A2ncer-Corumba-MS-387701464664068/?ref=br_rs" target="_blank" title="Facebook Rede Feminina">
						<i class="fa fa-facebook fa-2x" style="padding-left: 30%; padding-top: 21%"> </i>
					</a>
				</span>

			</div>
			
		</div>

	</div>	

	<div class="container">										
		<p class="desenvolvedor"> &copy 2016 - Todos os direitos reservados. <br>
		Desenvolvido por <a href="https://br.linkedin.com/in/westerley-da-silva-reis-9140b79a" target="_brank" id="linkedin"> Westerley Reis </a> & <a href="https://br.linkedin.com/in/bruno-allison-82858a9a" target="_brank" id="linkedin"> Bruno Santos </a>
		</p>
	</div>
	
</div>	