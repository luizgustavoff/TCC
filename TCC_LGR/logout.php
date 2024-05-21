<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>???</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
           require_once "funcoes/banco.php";
           require_once "funcoes/funcoes.php";
           require_once "funcoes/login.php";
        ?>
        <div id="corpo">
            <?php
            logout();
            echo msg_sucesso('Usuario desconectado com sucesso');
            echo voltar();
            ?>
        </div> 
    </body>
</html>