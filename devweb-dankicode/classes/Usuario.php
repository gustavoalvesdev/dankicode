<?php 

class Usuario
{
	public function atualizarUsuario($nome, $senha, $imagem)
	{
		$sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
		$userUpdated = $sql->execute(array($nome, $senha, $imagem, $_SESSION['user']));

		return $userUpdated;
	}

	public static function userExists($user)
	{
		$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user = ?");
		$sql->execute(array($user));

		return $sql->rowCount() == 1;
	}

	public static function cadastrarUsuario($user, $senha, $imagem, $nome, $cargo)
	{
		$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null, ?, ?, ?, ?, ?)");
		$sql->execute(array($user, $senha, $imagem, $nome, $cargo));
	}

	public function lembrarLogin($user) {

		$sql = MySql::conectar()->prepare('UPDATE `tb_admin.usuarios` SET lembrar_login = 1 WHERE user = :user');
		$sql->bindValue(':user', $user);
		$sql->execute();
	}

	public function esquecerLogin($user) {

	}

	public function usuarioEstaLembrado($user)
	{

		$sql = MySql::conectar()->prepare('SELECT user, lembrar_login FROM `tb_admin.usuarios` WHERE user = :user LIMIT 1');
		$sql->bindValue(':user', $user);
		$sql->execute();

		if ($sql->rowCount() == 1) {
			$lembrar = $sql->fetch();
		}

		return $lembrar['lembrar_login'] == 1;
	}
}
