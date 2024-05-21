<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Jogos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
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
        <div id="corpo">
            <h1>Escolha o jogo que deseja recuperar</h1>            
            
            <form method="get" id="busca" action="produto_recuperar.php">
                Ordenar: 
                <a href="produto_recuperar.php?o=nome&c=<?php echo $chave;?>">Nome</a> | 
                <a href="produto_recuperar.php?o=marca&c=<?php echo $chave;?>">Marca</a> | 
                <a href="produto_recuperar.php">Mostrar Todos</a> |
                Buscar: <input type="text" name="c" size="10" maxlength="40"/>
                <input type="submit" value="OK"/>
            </form>

            <table class="listagem">
                <?php
                     echo "<br>";
                     $q="select p.nomeproduto, p.codproduto, m.nomemarca, p.img, c.nomecategoria from produtos p join categorias c on c.codcategoria = p.categoria join marcas m on m.codmarca = p.marca ";
                     
                     /*crie o if com concatenação de q no final*/
                     if(!empty($chave)){
                         $q .="where p.nomeproduto like '%$chave%' or p.categoria like '%$chave%' or p.marca like '%$chave%' ";
                     }
                     
                     $q .="and (p.ativo=false)";
 
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
                                     //echo "<td>Alterar | Excluir";
                                     echo "<td><a href='produto_recuperar_produto.php?cod=$reg->codproduto'><i class='material-icons'>add_circle</i></a>";
                             }
                         }
                     }
                     echo  "<tr>";
                     echo voltar();
                ?>
            </table>
        </div>
    </body>
</html>