<?php 

define('HOST', 'localhost');
define('DATABASE', 'suporte_personalizado');
define('USER', 'root');
define('PASSWORD', '');

$autoload = function ($class) {
    require $class . '.php';
};

spl_autoload_register($autoload);

Router::get('/', function($par){
    echo 'Estou na Home!';
});
