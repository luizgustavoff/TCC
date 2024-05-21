<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "funcoes/banco.php";
        require_once "funcoes/funcoes.php";
        require_once "funcoes/login.php";
    ?>    

    <?php
    if(!is_logado()){
        echo "<a href='login.php'><input type='button' value='Log-in'></a><br><br>";
    }else{
        echo "<a href='logout.php'><input type='button' value='Logout'></a><br><br>";
    }

    echo "<a href='produtos.php'><input type='button' value='produtos'></a><br><br>";

    if(is_admin()){
        echo "<a href='produto_new.php'><input type='button' value='cadastrar produto'></a><br><br>";
        echo "<a href='categoria_new.php'><input type='button' value='cadastrar categoria'></a><br><br>";
        echo "<a href='marca_new.php'><input type='button' value='cadastrar marca'></a><br><br>";
        echo "<a href='produto_recuperar.php'><input type='button' value='recuperar produto'></a><br><br>";
    }

    echo "<a href='perfil.php'><input type='button' value='perfil'></a><br><br>";

    echo "<a href='carrinho.php'><input type='button' value='carrinho'></a><br><br>";
    ?>

</body>
</html>