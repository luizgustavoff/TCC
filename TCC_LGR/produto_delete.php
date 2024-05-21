<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Excluir Produto</title>
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
                if(is_admin()){   
                    if(!isset($_POST['nomeproduto'])){
                        require "produto_delete_form.php";
                    }else{
                        $cod = $_POST['cod'] ?? null;
                        
                        $q = "UPDATE produtos SET ativo=false WHERE codproduto=$cod";

                        if($banco->query($q)){
                            echo msg_sucesso("Produto excluido com sucesso");
                        }else{
                            echo msg_erro("Não foi possivel excluir o produto");
                        }
                    }      
                }else{
                    echo msg_erro('Área restrita! Você não é administrador!');
                }
                echo voltar();
            ?>
        </div> 
    </body>
</html>