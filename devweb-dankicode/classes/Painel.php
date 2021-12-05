<?php 

class Painel 
{

	public static $cargos = [
		'0' => 'Normal',
		'1' => 'Sub Administrador',
		'2' => 'Administrador'
	];

	public static function logado()
	{
		$lembrar = false;
		$login = isset($_SESSION['login']);

		if (isset($_SESSION['user'])) {
			$usuario = new Usuario();
			$lembrar = $usuario->usuarioEstaLembrado($_SESSION['user']);
		} 

		return $lembrar || $login;
	}

	public static function loggout()
	{
		setcookie("lembrar", 'true', time() - 1, '/');
		session_destroy();
		header('Location: ' . INCLUDE_PATH_PAINEL);
	}

	public static function carregarPagina()
	{
		if (isset($_GET['url'])) {
			$url = explode('/', $_GET['url']);
			if (file_exists('pages/'.$url[0].'.php')) {
				include('pages/'.$url[0].'.php');
			} else {
				// Página não existe
				header('Location: ' . INCLUDE_PATH_PAINEL);
			}
		} else {
			include('pages/home.php');
		}
	}

	public static function listarUsuariosOnline() 
	{
		self::limparUsuariosOnline();
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
		$sql->execute();
		return $sql->fetchAll();
	}

	public static function limparUsuariosOnline() {
		$date = date('Y-m-d H:i:s');
		$sql = MySql::conectar()->exec("DELETE FROM `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
	}

	public static function alert($tipo, $mensagem)
	{
		if ($tipo == 'sucesso') {
			echo "<div class='box-alert sucesso'><i class='fa fa-check'></i> ". $mensagem ."</div>";
		} else if ($tipo == 'erro') {
			echo "<div class='box-alert erro'><i class='fa fa-times'></i> ". $mensagem ."</div>";
		}
	}

	public static function isImageValid($image) 
	{	
		$allowedImageTypes = ['image/jpeg', 'image/jpg', 'image/png'];
		$allowedImageSize = intval($image['size'] / 1024) < 3000; 


		$isImageValid = in_array($image['type'], $allowedImageTypes) && $allowedImageSize;

		
		return $isImageValid;
		
	}

	public static function uploadFile($file)
	{
		$fileFormat  = explode('.', $file['name']);
		$imageName = uniqid() . '.' . $fileFormat[count($fileFormat) - 1];
		$wasFileUploadedSuccessfully = move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL . '/uploads/' . $imageName);

		if ($wasFileUploadedSuccessfully) {
			$uploadedFile = $imageName;
		} else {
			$uploadedFile = '';
		}

		return $uploadedFile;
	}

	public static function deleteFile($filename)
	{
		if (file_exists('uploads/' . $filename)) {
			@unlink('uploads/' . $filename);
		}
	}

	public static function insert($arr) {

		$certo = true;
		$nome_tabela = $arr['nome_tabela'];
		$query = "INSERT INTO `$nome_tabela` VALUES (null";
		foreach($arr as $key => $value) {
			$nome = $key;
			$valor = $value;

			if ($nome == 'acao' || $nome == 'nome_tabela') {
				continue;
			}

			if ($value == '') {
				$certo = false;
				break;
			}

			$query .= ",?";
			$parametros[] = $value; 
		}

		$query .= ")";
		if ($certo == true) {
			$sql = MySql::conectar()->prepare($query);
			$sql->execute($parametros); 
		}
		return $certo;
	}

	public static function selectAll($tabela, $start = null, $end = null) {

		if ($start == null && $end == null) {
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
		} else {
			$start = intval($start);
			$end = intval($end);
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start , $end");
		}
		$sql->execute();
		return $sql->fetchAll();
	}

	public static function deletar($tabela, $id = false) {
		if ($id == false) {
			$sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
		} else {
			$sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
		}

		$sql->execute();
	}

	public static function redirect($url) {

		echo "<script>location.href='".$url."'</script>";

		die();

	}
	/*
	 	Método específico para selecionar apenas um registro
	 */
	public static function select($table, $query, $arr) {

		$sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
		$sql->execute($arr);
		return $sql->fetch();
	}

	public static function update($arr) {

		$certo = true;
		$first = false;
		$nome_tabela = $arr['nome_tabela'];
		$query = "UPDATE `$nome_tabela` SET ";
		foreach($arr as $key => $value) {
			$nome = $key;
			$valor = $value;

			if ($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id') {
				continue;
			}

			if ($value == '') {
				$certo = false;
				break;
			}

			if ($first == false) {
				$first = true;
				$query .= "$nome=?";
			}
			else {
				$query .= ",$nome=?";
			}
			$parametros[] = $value; 
		}
		if ($certo == true) {
			$parametros[] = $arr['id'];
			$sql = MySql::conectar()->prepare($query . ' WHERE id=?');
			$sql->execute($parametros); 
		}
		return $certo;
	}

}
