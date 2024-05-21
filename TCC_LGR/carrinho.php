<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Carrinho</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once "funcoes/banco.php";
            require_once "funcoes/funcoes.php";
            require_once "funcoes/login.php";
            $ordem = $_GET['o'] ?? "n";    /*recebe 'o' se nao receber fica "n"*/
            $chave = $_GET['c'] ?? "";     /*recebe 'c' se nao receber fica ""*/
        ?>
        <?php
        if(is_logado()){
        echo  "<h1>Produtos adicionados ao carrinho</h1>            
            
            <form method='get' id='busca' action='carrinho.php'>
                <a href='carrinho.php'>Mostrar Todos</a> |
                Buscar: <input type='text' name='c' size='10' maxlength='40'/>
                <input type='submit' value='OK'/>
            </form>

            <form method='post' action='detalhes.php'>
                <input type='hidden' id='carrinho' name='carrinho' value='carrinho'>
            </form>
            
            <table>";
                    echo "<br>";
                    $q="select p.nomeproduto, p.codproduto, m.nomemarca, p.img, p.valor, c.nomecategoria from produtos p join categorias c on c.codcategoria = p.categoria join marcas m on m.codmarca = p.marca ";
                    
                    /*crie o if com concatenação de q no final*/
                    if(!empty($chave)){
                        $q .="where p.nomeproduto like '%$chave%' or p.categoria like '%$chave%' or p.marca like '%$chave%' ";
                    }
                    
                    $q .="and (p.carrinho=true) ";

                    $q .="order by p.nomeproduto asc";

                    $busca = $banco->query($q);
                    if(!$busca){
                        echo "<tr><td>Infelizmente a busca deu errado";
                    }else{
                        if($busca->num_rows==0){
                            echo"<tr><td>Nenhum registro encontrado";
                        }else{
                            while($reg=$busca->fetch_object()){
                                $t = thumb($reg->img); 
                                echo "<tr><td><img src='$t'/>";
                                echo "<td><a href='detalhes_car.php?cod=$reg->codproduto'>$reg->nomeproduto</a>"; 
                                echo " [$reg->nomecategoria]";
                                echo "<br>$reg->nomemarca - $reg->valor";
                                echo "<td><a href='carremove.php?cod=$reg->codproduto'><i class='material-icons'>remove</i></a>";
                              /*if(is_admin()){
                                    //echo "<td>Alterar | Excluir";
                                    echo "<td><a href=#'>editar</a>";
                                    echo "<td><a href='#'>excluir</a>";
                                }*/
                            }
                            echo "<tr><td><a href='pedido.php'><input type='button' value='Finalizar compra'></a>";
                        }
                    }
                }else{
                    echo "Para vizualizar seu carrinho, <a href='login.php'>entre em sua conta</a><br>";
                }
                    echo  "<tr>";
                    echo voltar();
                ?>
            </table>
            </table>
    </body>
</html>