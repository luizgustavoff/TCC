<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Editar Produto</title>
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
                if(!is_admin()){
                  echo msg_erro('Área restrita! Você não é administrador!');
                }else{
                  if(!isset($_POST['nomeproduto'])){
                      require "produto_edit_form.php";
                  }else{
                    $nome = $_POST['nomeproduto'] ?? null;
                    $categoria = $_POST['categoria'] ?? null;
                    $marca = $_POST['marca'] ?? null;
                    $descricao = $_POST['descricao'] ?? null;
                    $novaimg = $_POST['novaimg'] ?? null;
                    $img = $_POST['img'] ?? null;
                    $valor = $_POST['valor'] ?? null;
                    $cod = $_POST['cod'] ?? null;

                    
                      if(empty($novaimg)){
                          $q = "UPDATE produtos SET nomeproduto='$nome', categoria=$categoria, marca=$marca, descricao='$descricao', valor=$valor, img='$img' WHERE codproduto=$cod";
                      }else{
                          $q = "UPDATE produtos SET nomeproduto='$nome', categoria=$categoria, marca=$marca, descricao='$descricao', valor=$valor, img='$novaimg' WHERE codproduto=$cod";
                      }
                      
                      if($banco->query($q)){
                        echo msg_sucesso("Produto $nome foi atualizado com sucesso");
                      }else{
                        echo msg_erro("Não foi possivel atualizar o produto $nome");
                      }
                    }
                }
                echo voltar();
            ?>
        </div> 
    </body>
</html>