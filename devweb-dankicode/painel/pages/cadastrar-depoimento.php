<?php 

	verificaPermissaoPagina(2);

?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Depoimentos</h2>

	<form method="POST" enctype="multipart/form-data">

		<?php 

			if (isset($_POST['acao'])) {
				if (Painel::insert($_POST)) {
					Painel::alert('sucesso', 'O cadastro depoimento foi feito com sucesso!');
				} else {
					Painel::alert('erro', 'Campos vazios não são permitidos!');
				}

			}	
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Depoimento:</label>
			<textarea name="depoimento"></textarea>
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label>Data:</label>
			<input type="text" formato="data" name="data">
		</div>
		<!-- form-group -->

		<div class="fom-group">
			<input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
			<input type="submit" name="acao" value="Adicionar!">
		</div>
		<!-- form-group -->
	</form>

</div>
<!-- box-content -->