<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body>
    <?php
      require_once "funcoes/banco.php";
      require_once "funcoes/funcoes.php";
      require_once "funcoes/login.php";
    ?>
    <?php
      if(!isset($_POST['novasenha'])){
        require "senha_new_form.php";
      }else{
        $email = $_POST['email'];
        $novasenha = $_POST['novasenha'];
        $novasenha1 = $_POST['novasenha1'];

        if($novasenha === $novasenha1){
          $senha = gerarHash($novasenha);
          $q = "UPDATE usuarios SET senha='$senha' WHERE email='$email'";

          $banco->query($q);

          echo "Senha alterada com sucesso!";
        }else{
          echo "As senhas não conferem!";
        }
      }
      echo "<a href='login.php'><span class='material-icons'>arrow_back</span></a>";
    ?>
  </body>
</html>