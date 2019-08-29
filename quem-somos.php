<div class="container">
	<div class="row">

		<h2 class="section-titulo"> QUEM SOMOS </h2>
		<div class="divisoria"> <img src="img/themes/divisoria-rosa.png"> </div>

		<?php
			$administrador = DaoAdministrador::getInstance();
			$adm = $administrador->listarPorID(1);
			echo $adm->conteudo;
		?>

	</div>	
				
</div>	