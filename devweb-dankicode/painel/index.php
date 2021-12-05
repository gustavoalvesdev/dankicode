<?php 

require_once '../config.php';

if (Painel::logado() == false) {
    require_once 'login.php';
} else {
    require_once 'main.php';
}
