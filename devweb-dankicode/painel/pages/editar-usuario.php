<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>

	<form method="POST" enctype="multipart/form-data">

		<?php 

			if (isset($_POST['acao'])) {
				// Enviei o meu formulário.
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				
				$usuario = new Usuario();

				if ($imagem['name'] != '') {

					// Existe o upload de imagem
					if (Painel::isImageValid($imagem)) {
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);

						if ($imagem != '') {
							$userUpdated = $usuario->atualizarUsuario($nome, $senha, $imagem);
							$_SESSION['img'] = $imagem; 
							if ($userUpdated) {
								Painel::alert('sucesso', 'Atualizado com sucesso junto com a imagem!');
							} else {
								Painel::alert('erro', 'Ocorreu um erro ao atualizar junto com a imagem!');
							}
						} else {
							Painel::alert('erro', 'Falha ao carregar imagem!');
						}
						
					} else {
						Painel::alert('erro', 'O formato de imagem não é válido');
					}
				} else {
					$imagem = $imagem_atual;
					
					$userUpdated = $usuario->atualizarUsuario($nome, $senha, $imagem);

					if ($userUpdated) {
						Painel::alert('sucesso', 'Atualizado com sucesso!');
					} else {
						Painel::alert('erro', 'Ocorreu um erro ao atualizar!');
					}
				}

			}	
		?>

		<div class="form-group">
			<label for="nome">Nome:</label>
			<input type="text" name="nome" value="<?php echo $_SESSION['nome']; ?>" required>
		</div>
		<!-- form-group -->
		<div class="form-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
		</div>
		<!-- form-group -->
		<div class="form-group">
			<label for="imagem">Imagem:</label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
		</div>
		<!-- form-group -->
		<input type="submit" name="acao" value="Atualizar!">
	</form>

</div>
<!-- box-content -->