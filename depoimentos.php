<div class="container">
	<div class="row">
		<div class="col-md-12">					

			<h2 class="section-titulo"> DEPOIMENTOS </h2>
			<div class="divisoria"> <img src="img/themes/divisoria-rosa.png"> </div>

			<div class="col-md-8 col-md-offset-2">
				<div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="4000">
				  <!-- Carousel indicators -->

					<ol class="carousel-indicators">
						<li data-target="#fade-quote-carousel" data-slide-to="0" class="active"> </li>
						<li data-target="#fade-quote-carousel" data-slide-to="1"> </li>
						<li data-target="#fade-quote-carousel" data-slide-to="2"></li>
					</ol>

					<div class="carousel-inner">
						<?php
						$conexao = DaoAdministrador::getInstance();
						$administrador = $conexao->listarDepoimentos();
						foreach ($administrador as $adm) {
						?>
							<div class="<?php echo $adm->ativo ?> item">
								<img class="profile-circle img-responsive" src="img/photos/depoimentos/<?php echo $adm->imagem ?>">
								<blockquote>
									<h4> <?php echo $adm->nome ?> </h4>
									<p> <?php echo $adm->conteudo ?> </p>
								</blockquote>
							</div>

						<?php } ?>
				  	</div>

				</div>  
			</div>
		</div> 
	</div>
</div>	