<section class="banner-container">
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form.jpg');" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form2.jpg');" class="banner-single"></div><!--banner-single-->
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg-form3.jpg');" class="banner-single"></div><!--banner-single-->
	<div class="overlay"></div><!--overlay-->
		<div class="center">
		<form method="post">
			<h2>Qual o seu melhor e-mail?</h2>
			<input type="email" name="email" required />
			<input type="hidden" name="identificador" value="form_home" />
			<input type="submit" name="acao" value="Cadastrar!">
		</form>
		</div><!--center-->
		<div class="bullets"></div><!--bullets-->
</section><!--banner-principal-->

	<section class="descricao-autor">
		<div class="center">
		<div class="w50 left">
			<h2>Gustavo</h2>
			<p>Autor</p>
		</div><!--w50-->
		<div class="w50 left">
			<!--Pegar imagem depois-->
			<img class="right" src="<?php echo INCLUDE_PATH; ?>images/foto.jpg" />
		</div><!--w50-->
		<div class="clear"></div>
		</div><!--center-->
	</section><!--descricao-autor-->

	<section class="especialidades">
		
		<div class="center">
			<h2 class="title">Especialidades</h2>
			<div class="w33 left box-especialidade">
					<h3><i class="fa fa-phone" aria-hidden="true"></i></h3>
					<h4>CSS3</h4>
					<p>Texto</p>
			</div><!--box-especialidade-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa fa-phone" aria-hidden="true"></i></h3>
				<h4>HTML5</h4>
				<p>Texto</p>
			</div><!--box-especialidade-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa fa-phone" aria-hidden="true"></i></h3>
				<h4>JavaScript</h4>
				<p>Texto</p>
			</div><!--box-especialidade-->
			
			<div class="clear"></div>
		</div><!--center-->

	</section><!--especialidades-->

	<section class="extras">

		<div class="center">
			<div id="depoimentos" class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos dos nossos clientes</h2>
				<div class="depoimento-single">
					<p class="depoimento-descricao">"Este é um depoimento"</p>
					<p class="nome-autor">Autor</p>
				</div><!--depoimento-single-->
			</div><!--w50-->
			<div id="servicos" class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
				<ul>
					<li>Serviço</li>
					<li>Serviço</li>
					<li>Serviço</li>
				</ul>
				</div><!--servicos-->
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--extras-->