<?php 

	verificaPermissaoPagina(2);

?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="POST" enctype="multipart/form-data">

		<?php 

			if (isset($_POST['acao'])) {
				if (isset($_POST['acao'])) {
					// Enviei o meu formulário.
					$login = $_POST['login'];
					$nome = $_POST['nome'];
					$senha = $_POST['password'];
					$imagem = $_FILES['imagem'];
					$cargo = $_POST['cargo'];

					if ($login == '') {
						Painel::alert('erro', 'O login está vazio!');
					} else if($nome == '') {
						Painel::alert('erro', 'O nome está vazio!');
					} else if ($senha == '') {
						Painel::alert('erro', 'A senha está vazia!');
					} else if ($cargo == '') {
						Painel::alert('erro', 'O cargo precisa estar selecionado!');
					} else if ($imagem['name'] == '') {
						Painel::alert('erro', 'A imagem precisa estar selecionada!');
					} else {
						// Prodemos cadastrar!
						if ($cargo >= $_SESSION['cargo']) {
							Painel::alert('erro', 'Você precisa selecionar um cargo menor que o seu!');
						} else if (!Painel::isImageValid($imagem)) {
							Painel::alert('erro', 'Imagem inválida!');
						} else if (Usuario::userExists($login)) {
							Painel::alert('erro', 'Este login já existe!');
						} else {
							// Apenas cadastrar no banco de dados!
							$usuario = new Usuario();
							$imagemCadastrar = Painel::uploadFile($imagem);
							$usuario->cadastrarUsuario($login, $senha, $imagemCadastrar, $nome, $cargo);
							Painel::alert('sucesso', 'O cadastro do usuário ' . $login . ' foi feito com sucesso!');
						} 
					}
				}

			}	
		?>

		<div class="form-group">
			<label>Login:</label>
			<input type="text" name="login">
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome">
		</div>
		<!-- form-group -->
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password">
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label for="cargo">Cargo:</label>
			<select name="cargo">
				<?php 
					foreach (Painel::$cargos as $key => $value) {
						if ($key < $_SESSION['cargo']) echo '<option value="' . $key . '">' . $value . '</option>';
					}
				?>
			</select>
		</div>
		<!-- form-group -->

		<div class="form-group">
			<label for="imagem">Imagem:</label>
			<input type="file" name="imagem">
		</div>
		<!-- form-group -->
		<input type="submit" name="acao" value="Adicionar!">
	</form>

</div>
<!-- box-content -->