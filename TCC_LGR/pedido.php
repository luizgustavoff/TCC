<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Finalizar Compra</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
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
                if(!isset($_POST['q1'])){
                    require "pedido_qtd.php";
                }else{
                $cod = $_SESSION['cod'];
                $q = "select*from produtos where carrinho=true";
                $busca = $banco->query($q);
                $valorfinal = 0;

                for($x=0; $reg = $busca->fetch_object(); $x++){
                    $qtd[] = $_POST['q'.$x];
                    $valorfinal = $valorfinal + $reg->valor * $qtd[$x];
                }
                $valorfinal = number_format($valorfinal, 2, '.',);

                $q1 = "insert into pedidos (codusuario, dataped, valorfinal) values ($cod, now(), $valorfinal)";
                $banco->query($q1);
                
                $q2 = "select codpedido from pedidos where codusuario=$cod order by codpedido desc";
                $busca2 = $banco->query($q2);
                $reg2 = $busca2->fetch_object();

                
                $q = "select*from produtos where carrinho=true";
                $busca = $banco->query($q);
                
                for($x=0; $reg = $busca->fetch_object(); $x++){
                    $subvalor = $reg->valor * $qtd[$x];

                    $q3 = "insert into itens (codped, codpdt, qtde, subvalor) values ($reg2->codpedido, $reg->codproduto, $qtd[$x], $subvalor)";

                    $banco->query($q3);

                    $q4 = "UPDATE produtos SET carrinho=false WHERE codproduto=$reg->codproduto";

                    $banco->query($q4);
                }


                echo "Pedido finalizado com sucesso<br>";
                }
                echo "<a href='carrinho.php'><span class='material-icons'>arrow_back</span></a>";
            ?>
        </div> 
    </body>


</html>


