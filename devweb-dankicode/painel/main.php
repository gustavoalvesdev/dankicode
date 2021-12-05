<?php 
    
    if (isset($_GET['loggout'])) {
        Painel::loggout();
    }

    if (!defined('INCLUDE_PATH_PAINEL')) {
        require_once '../config.php';
        header('Location: ' . INCLUDE_PATH_PAINEL);
        die();
    } else {
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Painel de Controle</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
        <link rel="stylesheet" href="<?= INCLUDE_PATH_PAINEL ?>css/style.css">
    </head>
    <body>
        <div class="menu">
            <div class="menu-wrapper">
                <div class="box-usuario">
                    <?php 
                        if ($_SESSION['img'] == '') {
                    ?>
                        <div class="avatar-usuario">
                            <i class="fa fa-user"></i>
                            <!-- fa -->
                        </div>
                    <!-- avatar-usuario -->
                    <?php } else { ?>
                            <div class="imagem-usuario">
                                <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
                            </div>
                            <!-- imagem-usuario -->
                    <?php } ?>
                    <div class="nome-usuario">
                        <p><?php echo $_SESSION['nome']; ?></p>
                        <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                    </div>
                    <!-- nome-usuario -->
                </div>
                <!-- box-usuario -->
                <div class="items-menu">
                    <h2>Cadastro</h2>
                    <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                    <a <?php selecionadoMenu('cadastrar-servico'); ?>  href="#">Cadastrar Serviço</a>
                    <a <?php selecionadoMenu('cadastrar-slides'); ?>  href="#">Cadastrar Slides</a>
                    <h2>Gestão</h2>
                    <a <?php selecionadoMenu('listar-depoimentos'); ?>  href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos">Listar Depoimentos</a>
                    <a <?php selecionadoMenu('listar-servicos'); ?>  href="#">Listar Serviços</a>
                    <a <?php selecionadoMenu('listar-slides'); ?>  href="#">Listar Slides</a>
                    <h2>Administração do Painel</h2>
                    <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                    <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?>  href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
                    <h2>Configuração Geral</h2>
                    <a <?php selecionadoMenu('editar-site'); ?>  href="#">Editar Site</a>
                </div>
                <!-- items-menu -->
            </div>
            <!-- menu-wrapper -->
        </div>
        <!-- menu -->
        <header>
            <div class="center">
                <div class="menu-btn">
                    <i class="fa fa-bars"></i>
                    <!-- fa -->
                </div>
                <!-- menu-btn -->

                <div class="loggout">
                    <a <?php if (!isset($_GET['url']) || $_GET['url'] == '') { ?> style="background: #60727a; padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
                    <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span> </a>
                    <!-- fa -->
                </div>
                <!-- loggout -->
                <div class="clear"></div>
                <!-- clear -->
            </div>
            <!-- center -->
        </header>

        <div class="content">
            
            <?php Painel::carregarPagina(); ?>

        </div>
        <!-- content -->

        <script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
        <script type="text/javascript" src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.min.js"></script>
    </body>
</html>

<?php
    } 
?>