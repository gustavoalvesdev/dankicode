<?php 
        
    if (isset($_COOKIE['lembrar'])) {
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $pdo = MySql::conectar();
        $sql = $pdo->prepare('SELECT * FROM `tb_admin.usuarios` WHERE user = :user AND password = :password');
        $sql->bindValue(':user', $user);
        $sql->bindValue(':password', $password);
        $sql->execute();

        if ($sql->rowCount() == 1) {
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];

            header('Location: ' . INCLUDE_PATH_PAINEL);
            die();
        }

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
    
    <div class="box-login">
        <?php 
            if (isset($_POST['acao'])) {
                $user = addslashes($_POST['user']);
                $password = addslashes($_POST['password']);
                $pdo = MySql::conectar();

                if ($pdo != null) {
                    $sql = $pdo->prepare('SELECT * FROM `tb_admin.usuarios` WHERE user = :user AND password = :password');
                    $sql->bindValue(':user', $user);
                    $sql->bindValue(':password', $password);
                    $sql->execute();
    
                    if ($sql->rowCount() > 0) {
                        $info = $sql->fetch();
                        // Logado com sucesso
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $user;
                        $_SESSION['password'] = $password;
                        $_SESSION['cargo'] = $info['cargo'];
                        $_SESSION['nome'] = $info['nome'];
                        $_SESSION['img'] = $info['img'];

                        if (isset($_POST['lembrar'])) {

                            setcookie('lembrar', true, time() + (60 * 60 * 24), '/');
                            setcookie('user', $user, time() + (60 * 60 * 24), '/');
                            setcookie('password', $password, time() + (60 * 60 * 24), '/');
                        }

                        header('Location: ' . INCLUDE_PATH_PAINEL);
                        die();
                    } else {
                        // Falhou
                        echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
                    }

                }

            }
        ?>
        <h2>Efetue o login:</h2>
        <form method="POST">
            <input type="text" name="user" placeholder="Login..." required>
            <input type="password" name="password" placeholder="Senha..." required>
            <div class="form-group-login left">
                <input type="submit" name="acao" value="Logar!">
            </div>
            <!-- form-group-login -->
            <div class="form-group-login right">
                <label for="lembrar">Lembrar-me</label>
                <input type="checkbox" name="lembrar">
            </div>
            <!-- form-group-login -->
            <div class="clear"></div>
            <!-- clear -->
        </form>
    </div>
    <!-- box-login -->
</body>
</html>

<?php } ?>