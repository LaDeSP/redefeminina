<?php
	header('Content-Type: text/html; charset=UTF-8');
	include_once dirname(__FILE__).'/profile/classes/autoload.php';
	require_once 'recaptchalib.php';
?>

<!doctype html>
<html lang="pt-br">

	<head>
		<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
		<title> Rede Feminina de Combate ao Câncer de Corumbá-MS </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo PATHSITE ?>/img/themes/favicon.ico" />
		<meta name="description" content="A Rede Feminina de Combate ao Câncer desenvolve um papel de
		grande relevância social no município de Corumbá por meio de ações de combate ao câncer.">
		<meta name="keywords" content="Rede Feminina Corumbá-MS, Combate ao Câncer, Outubro Rosa">

		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<style>
			<?php
				echo file_get_contents(PATHSITE.'/public/css/style.min.css');
				echo file_get_contents(PATHSITE.'/public/css/depoimentos.min.css');
			?>
		</style>

	</head>	

	<body>
		<header class="container">
			<nav class="navbar navbar-default">
			    <div class="navbar-header">
					<a class="navbar-brand" id="nome-logo">
						Rede Feminina de Combate ao Câncer
					</a>
					<a class="navbar-brand" id="logo">
						<img alt="Rede Feminina Corumbá-MS" src="<?php echo PATHSITE ?>/img/themes/logo.png" class="img-responsive">
					</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
			    </div>
				
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
			        	<li> <a href="#home" class="ancora"> Home </a> </li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sobre a Rede <i class="caret"> </i> </a>
							<ul class="dropdown-menu">
								<li> <a href="#quem-somos" class="ancora"> Quem Somos </a> </li>
								<li> <a href="#parceiros" class="ancora"> Parceiros </a> </li>
								<li> <a href="<?php echo PATHSITE ?>/album.php"> Galeria de Fotos </a> </li>
							</ul>
			        	<li> <a href="#depoimentos" class="ancora"> Depoimentos </a> </li>
						<li> <a href="#contato" class="ancora"> Contato </a> </li>
			      	</ul>
			    </div>
			</nav>
		</header>

		<a href="home"> </a>

		<div id="divi-rosa"> </div>

		<section class="container" id="principal">
			<?php
				include 'principal.php';
			?>		
		</section>

		<a href="quem-somos"> </a>
		<section id="quem-somos">
			<?php
				include 'quem-somos.php';
			?>				
		</section>
		
		<a href="depoimentos"> </a>
		<section id="depoimentos">
			<?php
				include 'depoimentos.php';
			?>			
		</section>

		<section class="aviso">
			<div class="container">
				<div class="row">
					<h2> SAIBA COMO SER VOLUNTÁRIA </h2>
					<?php
						$administrador = DaoAdministrador::getInstance();
						$adm = $administrador->listarPorID(4);
						echo limitarTexto($adm->conteudo, 500);
					?>
				</div>
			</div>
		</section>
		
		<a href="parceiros"> </a>
		<section id="parceiros">
			<?php
				include 'parceiros.php';
			?>				
		</section>

		<section class="aviso">
			<div class="container">
				<div class="row">
					<h2> SAIBA COMO REALIZAR DOAÇÕES </h2>
					<?php
						$administrador = DaoAdministrador::getInstance();
						$adm = $administrador->listarPorID(5);
						echo limitarTexto($adm->conteudo, 471);
					?>
				</div>
			</div>		
		</section>
		
		<a href="contato"> </a>			
		<footer id="contato">
			<?php
				include 'contato.php';
			?>			
		</footer>

		<div id="voltar-topo" class="active">
			<a href="#home" id="topo" class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"> </a>
		</div>

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="<?php echo PATHSITE ?>/public/js/script.min.js"> </script>
		<script src="<?php echo VIEWS ?>/_font/js/maskedinput.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
	</body>

</html>