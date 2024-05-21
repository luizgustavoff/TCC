<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Produto</title>
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
                    if(!isset($_POST['nomeproduto'])){
                        require "produto_new_form.php";
                    }else{
                        $nome = $_POST['nomeproduto'] ?? null;
                        $categoria = $_POST['categoria'] ?? null;
                        $marca = $_POST['marca'] ?? null;
                        $descricao = $_POST['descricao'] ?? null;
                        $img = $_POST['img'] ?? null;
                        $valor = $_POST['valor'] ?? null;

                            if(empty($nome)||empty($categoria)||empty($marca)||empty($descricao)||empty($valor)){
                                echo msg_erro('Todos os dados são obrigatórios');
                            }else{
                                $q = "INSERT INTO produtos(nomeproduto,categoria,marca,descricao,valor,img)VALUES('$nome','$categoria','$marca','$descricao','$valor','$img')";
                                if($banco->query($q)){
                                    echo msg_sucesso("Produto $nome cadastrado com sucesso");
                                }else{
                                    echo msg_erro("Não foi possivel cadastrar o $nome");
                                }
                            }
                        }
                    }
                echo voltar();
            ?>
    </body>
</html>