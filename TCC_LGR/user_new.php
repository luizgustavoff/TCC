<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Usuário</title>
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
                if(is_admin()){
                    echo msg_erro('Página a se fazer');
                }else{
                    if(!isset($_POST['nome'])){
                        require "user_new_form_cliente.php";
                    }else{
                        $nome = $_POST['nome'] ?? null;
                        $email = $_POST['email'] ?? null;
                        $senha1 = $_POST['senha1'] ?? null;
                        $senha2 = $_POST['senha2'] ?? null;

                        if($senha1 === $senha2){
                            //echo msg_sucesso("Tudo certo para gravar");
                            if(empty($nome)||empty($senha1)||empty($senha2)||empty($email)){
                                echo msg_erro('Todos os dados são obrigatórios');
                            }else{
                                $senha = gerarHash($senha1);
                                $q = "INSERT INTO usuarios(nome,senha,email)VALUES('$nome','$senha','$email')";
                                if($banco->query($q)){
                                    echo msg_sucesso("$nome cadastrado com sucesso");
                                }else{
                                    echo msg_erro("Não foi possivel cadastrar o usuário $nome");
                                }
                            }
                        }else{
                            echo msg_erro("As senhas não conferem!");
                        }
                    }
                    //echo "<h1>Novo usuário</h1>";
                }
                echo voltar();
            ?>
    </body>
</html>