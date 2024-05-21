<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Recuperar Produto</title>
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
                        require "produto_recuperar_produto_form.php";
                    }else{
                        $cod = $_POST['cod'] ?? null;
                        
                        $q = "UPDATE produtos SET ativo=true WHERE codproduto=$cod";

                        if($banco->query($q)){
                            echo msg_sucesso("Produto recuperado com sucesso");
                        }else{
                            echo msg_erro("Não foi possivel recuperar o produto");
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