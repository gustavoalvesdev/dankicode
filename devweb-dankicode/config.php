<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$autoload = function($class) {
	if ($class == 'Email') {
		require_once 'classes/phpmailer/PHPMailerAutoload.php';
	}
	require_once 'classes/' . $class . '.php';
};

spl_autoload_register($autoload);

// Constantes para o Painel de Controle

define('INCLUDE_PATH', 'http://localhost/Projeto_01/');
define('INCLUDE_PATH_PAINEL', INCLUDE_PATH . 'painel/');
define('BASE_DIR_PAINEL', __DIR__ . '/painel');
define('NOME_EMPRESA', 'Danki Code');

// Conectar com banco de dados
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'projeto_01');

// Funções
function pegaCargo($indice) {
	return Painel::$cargos[$indice];
}


function selecionadoMenu($par) {
	if (isset($_GET['url'])) {
		$url = explode('/', $_GET['url']);
		if ($url[0] == $par) {
			echo 'class="menu-active"';
		}
	}
}

function verificaPermissaoMenu($permissao) {
	if ($_SESSION['cargo'] >= $permissao) {
		return;
	} else {
		echo 'style="display:none;"';
	}
}

function verificaPermissaoPagina($permissao) {
	if ($_SESSION['cargo'] >= $permissao) {
		return;
	} else {
		require_once 'painel/pages/permissao_negada.php';
		die();
	}
}