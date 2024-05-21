<?php
  $q = "select nomeproduto from produtos where carrinho=true";
  $busca = $banco->query($q);

?>

<form action="pedido.php" method="POST">
    <table>
        <?php
         $x=0;
          while($reg = $busca->fetch_object()){
            echo "<tr><td>".$reg->nomeproduto;
            echo "<td>Quantidade - <input type='number' name='q$x' id='q$x' min='1' required>";
            $x++;
          }
        ?>
        <tr><td><td><input class="botao" type="submit" value="Finalizar compra">
    </table>
</form>
