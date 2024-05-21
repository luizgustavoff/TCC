<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Produtos</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css"> 
    </head>

    <body>
        <?php
            require_once "funcoes/banco.php";
            require_once "funcoes/funcoes.php";
            require_once "funcoes/login.php";
            $ordem = $_GET['o'] ?? "n";    /*recebe 'o' se nao receber fica "n"*/
            $chave = $_GET['c'] ?? "";     /*recebe 'c' se nao receber fica ""*/
        ?>
            <h1>Produtos</h1>            
            
            <form method="get" id="busca" action="produtos.php">
                Ordenar: 
                <a href="produtos.php?o=nome&c=<?php echo $chave;?>">Nome</a> | 
                <a href="produtos.php?o=marca&c=<?php echo $chave;?>">Marca</a> | 
                <a href="produtos.php">Mostrar Todos</a> |
                Buscar: <input type="text" name="c" size="10" maxlength="40"/>
                <input type="submit" value="OK"/>
            </form>

            <table>
            <?php
                    echo "<br>";
                    $q="select p.nomeproduto, p.codproduto, m.nomemarca, p.img, c.nomecategoria from produtos p join categorias c on c.codcategoria = p.categoria join marcas m on m.codmarca = p.marca ";
                    
                    /*crie o if com concatenação de q no final*/
                    if(!empty($chave)){
                        $q .="where p.nomeproduto like '%$chave%' or p.categoria like '%$chave%' or p.marca like '%$chave%' ";
                    }
                    
                    $q .="and (p.ativo=true)";

                    switch ($ordem){
                        case "nome":
                            $q .="order by p.nomeproduto asc";
                            break;
                        case "marca":
                            $q .="order by p.marca asc";
                            break;
                        default:
                            $q .="order by p.nomeproduto asc";
                    }
                
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
                                echo "<td><a href='detalhes.php?cod=$reg->codproduto'>$reg->nomeproduto</a>"; 
                                //inserir genero e produtora
                              
                                echo " [$reg->nomecategoria]";
                                echo "<br>$reg->nomemarca";
                              /*if(is_admin()){
                                    //echo "<td>Alterar | Excluir";
                                    echo "<td><a href=#'>editar</a>";
                                    echo "<td><a href='#'>excluir</a>";
                                }*/
                            }
                        }
                    }
                    echo  "<tr>";
                    echo voltar();
                ?>
            </table>
            </table>
    </body>
</html>