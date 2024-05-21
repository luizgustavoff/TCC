<pre><?php

    /* linha de conexao com o BD
     $banco = new mysqli(host, usuario, senha, banco); */
    $banco = new mysqli("localhost", "root", "", "tcc_lgr");
    
    /* Se houver algum erro na conexao sera emitido uma msg e die() mata tudo*/
    if($banco->connect_errno){
        echo "<p>Encontrei um erro $banco->errno --> $banco->connect_error</p>";
        die();
    }

    /* Transformar os resultados com padrões utf8*/
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

    /* Uma busca simples dentro do banco */
    $busca = $banco->query("select * from usuarios"); 
    if(!$busca){
        echo "<p>Falha na busca! $banco->error</p>";
    }
    else{
        while($reg = $busca->fetch_object()){
            print_r($reg);
        }
       
    }
?>