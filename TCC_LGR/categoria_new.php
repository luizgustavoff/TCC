<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Nova Categoria</title>
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
                if(!is_admin()){
                    echo msg_erro('Área restrita! Você não é administrador!');
                }else{
                    if(!isset($_POST['categoria'])){
                        require "categoria_new_form.php";
                    }else{
                        $categoria = $_POST['categoria'] ?? null;

                        $q = "INSERT INTO categorias(nomecategoria)VALUE('$categoria')";
                        if($banco->query($q)){
                          echo msg_sucesso("Categoria $categoria cadastrada com sucesso");
                        }else{
                          echo msg_erro("Não foi possivel cadastrar a categoria $categoria");
                        }
                      }                 
                    }
                echo voltar();
            ?>
    </body>
</html>