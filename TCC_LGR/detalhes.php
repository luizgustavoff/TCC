<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Detalhes do Produto</title>
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
            <?php
                $c = $_GET['cod'] ?? 0;
                $busca = $banco->query("select * from produtos where codproduto='$c'");
            ?>
            <h1>Detalhes do Produto</h1>
            <table>
                <?php
                    if(!$busca){
                        echo "<tr><td>Busca falhou! $banco->error";
                    }else{
                        if($busca->num_rows == 1){
                            $reg = $busca->fetch_object();
                            $t = thumb($reg->img);
                            echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                            echo "<td><h2>$reg->nomeproduto</h2>";
                            echo "Valor: ".number_format($reg->valor,2);
                            if(is_admin()){
                                echo "<td><a href='produto_edit.php?cod=$reg->codproduto'><i class='material-icons'>edit</i></a>";
                                echo "<a href='produto_delete.php?cod=$reg->codproduto'><i class='material-icons'>delete</i></a>";
                            }
                            echo "<tr><td>$reg->descricao";
                            
                            echo "<br><br><a href='carmsg.php?cod=$reg->codproduto'><input type='button' value='Adicionar ao Carrinho'></a>";
                        }else{
                            echo "<tr><td>Nenhum registro encontrado";
                        }
                    }
                ?>
            </table>
            <?php
                echo "<a href='produtos.php'><span class='material-icons'>arrow_back</span></a>";
            ?>
    </body>
</html>