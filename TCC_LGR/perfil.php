<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
        require_once "funcoes/banco.php";
        require_once "funcoes/funcoes.php";
        require_once "funcoes/login.php";
    ?>
    <?php
        if(empty($_SESSION['cod'])){
        echo "Para vizualizar seu perfil, <a href='login.php'>entre em sua conta</a>";
        }else{
            echo "<a href='compras_realizadas.php '><input type='button' value='Compras já realizadas'></a>";
        }
        
        echo "<br>".voltar();
    ?>

</body>
</html>