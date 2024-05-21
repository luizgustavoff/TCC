<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Login de Usuário</title>
        <meta charset="UTF-8">
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
                $email = $_POST['email'] ?? null;
                $s = $_POST['senha'] ?? null;

                if(is_null($email) || is_null($s)){
                   require "login_form.php";
                }else{
                    //echo "Dados foram passados... ";
                    $q = "select cod,nome,email,senha,tipo from usuarios where email= '$email' limit 1";
                    $busca = $banco->query($q);
                    if(!$busca){
                        echo 'Falha ao acessar o banco!';
                    }else{
                        if($busca->num_rows>0){
                            $reg = $busca->fetch_object();
                            //print_r($reg);
                            if(testarHash($s,$reg->senha)){
                                echo 'Logado com sucesso<br>';
                                $_SESSION['cod'] = $reg->cod;
                                $_SESSION['email'] = $reg->email;
                                $_SESSION['tipo'] = $reg->tipo;
                            }else{
                                echo 'Senha inválida<br>';
                                echo "<a href='senha_new.php'>Esqueci minha senha</a><br>";
                            } 
                        }else{
                            echo 'Email inválido<br>';
                        }
                    }
                }
                echo voltar();
            ?>
        </div>
    </body>
</html>