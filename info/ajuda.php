<?php include_once dirname(__DIR__).'/profile/classes/autoload.php'?>
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
			#quem-somos p,.aviso p{text-align:center;line-height:25px}#topo,.active{outline:0!important}#topo,.limita_texto{text-decoration:none}@font-face{font-family:FonteParceiros;src:url(../public/fonts/ARBERKLEY.ttf)}.navbar{background-color:#FFF!important;border-color:#FFF!important}#nome-logo{display:none}@media only screen and (min-width:768px){.navbar{height:130px!important}}@media only screen and (max-width:769px){.navbar-brand{display:none}#nome-logo{display:block}}.nav{padding-top:4%}.nav li a{font-family:tahoma;font-size:17px}.nav li a:hover{border-bottom:3px solid #FF64B1!important;padding-bottom:10px}.dropdown a{background:#fff!important}.login{margin-top:4%}.login img{margin:auto;padding-top:3%;padding-bottom:8%}.aviso h2,.divisoria,.espaco{margin-bottom:2%}#contato img,#quem-somos p,.sobre{margin-left:2%;margin-right:2%}#divi-rosa{width:100%;height:5px;background-color:#FF64B1;margin-top:-20px}section .carousel{margin-top:30px}.informacao{margin-top:1%;border:1px solid #FF64B1}.section-titulo{font-size:2.45em;color:#F0F;font-family:arial;text-align:center;margin-top:33px}.divisoria{text-align:center;margin-top:-1%}#voluntaria a{font-family:Arial;font-weight:700;color:#FF64B1}#quem-somos{background:linear-gradient(to bottom,#fff,#FFF0FF);margin-top:2%}#quem-somos p{padding-bottom:2%}.aviso{background-color:#FF64B1}.aviso h2{color:#FFF;text-align:center}.aviso p{padding-left:2%;padding-right:2%;color:#ECECFB}#contato,#linkedin{color:#FFF}#contato{background-image:url(../img/themes/background-contato.png);font-size:15px}.formulario{height:43px!important}#contato h3{margin-top:10%;margin-bottom:3%;color:#FFF}.btn-enviar{margin-top:2%;font-weight:700!important;font-family:Arial!important;background-color:#FF64B1!important;border:1px solid #FFF!important}.desenvolvedor{margin-top:2%;padding-top:1%;border-top:1px solid #ECECFB}.contato-sistema{margin-top:5%;padding-top:1%;border-top:1px solid #9e9e9e}.contato-sistema a{color:#4c4c4c}.redesocial{border-radius:50%;display:inline-block;height:45px;width:45px;background-color:#9d9d9d}.redesocial a{color:#fff}#voltar-topo{position:fixed;right:30px;z-index:1;bottom:30px}.active{display:none;opacity:1}#topo,.show-menu{display:block}#topo{color:#888}.sobre p{margin-top:2%;margin-bottom:2%;font-family:Arial;font-size:15px;text-align:justify}.limita_texto{color:#ECECFB}#parceiros{background-color:#EEE}#parceiros p{text-align:center;font-size:25px;font-family:FonteParceiros}.logo-parceiros{list-style:none}.logo-parceiros li{background-color:#FFF;width:150px;height:110px;float:left;margin:1%}
		</style>
	</head>	

	<body>
		
		<header class="container">				
			<nav class="navbar navbar-default">
			    <div class="navbar-header">
			      <a class="navbar-brand" id="nome-logo" href="../index.php">
			     	Rede Feminina de Combate ao Câncer
			      </a>
					<a class="navbar-brand" id="logo" href="../index.php">
			     	<img alt="Rede Feminina Corumbá-MS" src="../img/themes/logo.png" class="img-responsive"> 
			      </a>  
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li> <a href="../index.php#home"> Home </a> </li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Sobre a Rede <i class="caret"> </i> </a>
							<ul class="dropdown-menu">
								<li> <a href="../index.php#quem-somos"> Quem Somos </a> </li>
								<li> <a href="../index.php#parceiros"> Parceiros </a> </li>
								<li> <a href="<?php echo PATHSITE ?>/album.php"> Galeria de Fotos </a> </li>
							</ul>
						<li> <a href="../index.php#depoimentos"> Depoimentos </a> </li>
						<li> <a href="#contato"> Contato </a> </li>
					</ul>
				</div>
			</nav>
		</header>
		
		<div id="divi-rosa"> </div>

		<section>
			<div class="container">
				<div class="row">
					
					<h2 class="section-titulo"> COMO SER VOLUNTÁRIO </h2>
					<div class="divisoria"> <img src="../img/themes/divisoria-rosa.png"> </div>
					
					<div class="sobre">
						<?php
						include_once '../'.dirname(__FUNCTION__) . '/profile/classes/conexao.class.php';
						include_once '../'.dirname(__FUNCTION__) . '/profile/classes/daoadministrador.class.php';
						$administrador = DaoAdministrador::getInstance();
						$adm = $administrador->listarPorID(4);
						echo $adm->conteudo;
						?>

						<div id="voluntaria">
							<a href="juramento.php"> Veja o Juramento das voluntárias </a>
						</div>

					</div>

					<h2 class="section-titulo"> COMO AJUDAR </h2>
					<div class="divisoria"> <img src="../img/themes/divisoria-rosa.png"> </div>

					<div class="sobre">
						<?php
						$administrador = DaoAdministrador::getInstance();
						$adm = $administrador->listarPorID(5);
						echo $adm->conteudo;
						?>
					</div>

				</div>
				
			</div>
			
		</section>
		
		<a href="contato"> </a>
		<section id="contato">
			<?php
				include '../contato.php';
			?>			
		</section>

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		<script src="<?php echo PATHSITE ?>/public/js/script.min.js"> </script>
		<script src="<?php echo VIEWS ?>/_font/js/maskedinput.min.js"></script>
		<script src='https://www.google.com/recaptcha/api.js?hl=pt-BR'></script>
		
	</body>

</html>