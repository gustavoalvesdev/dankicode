<!DOCTYPE html>
<html>
    <body>
        <?php ob_start(); ?>
        <h1>Título do Conteúdo</h1>
        <p>
            Texto de conteúdo teste para ter alguma coisa para mostrar aqui só para fazer um volume bem legal na nossa tela do navegador web pertencente à empresa Google.
        </p>

        <?php 

            $content = ob_get_contents();

            ob_end_clean();

            if (isset($_GET['libera_conteudo'])) {
                echo $content;
            }

            if (isset($_GET['limpar_fluxo'])) {
                ob_end_flush();
            }

        ?>

        <form>
            <input type="submit" name="libera_conteudo" value="Liberar Conteúdo!">
            <input type="submit" name="limpar_fluxo" value="Limpar Fluxo!">
        </form>
    </body>
</html>