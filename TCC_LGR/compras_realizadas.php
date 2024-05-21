<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
  <body>
    <?php
      require_once "funcoes/banco.php";
      require_once "funcoes/funcoes.php";
      require_once "funcoes/login.php";
    ?>

    <?php
      $cod = $_SESSION['cod'];
      $q = "select p.codpedido, p.codusuario, p.dataped, p.valorfinal, i.codpdt, i.qtde, i.subvalor, pr.nomeproduto, pr.img from pedidos p join itens i on p.codpedido = i.codped join produtos pr on pr.codproduto = i.codpdt where codusuario = $cod";
      $busca = $banco->query($q);

      echo "<table>";
      while($reg = $busca->fetch_object()){
        $t = thumb($reg->img); 
        echo "<tr><td><img src='$t'/>";
        echo "<td>$reg->nomeproduto";
        echo "<br>Quantidade: $reg->qtde";
      }
    


      echo "</table>";
      echo "<tr>".voltar();
    ?>
  </body>
</html>