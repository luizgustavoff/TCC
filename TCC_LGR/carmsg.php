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
            $c = $_GET['cod'] ?? 0;
            $q="update produtos set carrinho=true where codproduto='$c'";
            if($banco->query($q)){
              echo msg_sucesso('Adicionado ao Carrinho');
          }else{
              echo msg_erro("Não foi possível adicionar ao carrinho");
          }

            echo "<a href='produtos.php'><span class='material-icons'>arrow_back</span></a>";
          ?>
        </div> 
    </body>
</html>