<?php
$c = $_GET['cod'] ?? 0;

$q = "select p.codproduto, p.nomeproduto, p.categoria, p.marca, c.nomecategoria, m.nomemarca, p.descricao, p.valor, p.img
from produtos p
join categorias c on c.codcategoria=p.categoria
join marcas m on m.codmarca=p.marca
where p.codproduto=$c";

$busca = $banco->query($q);
$reg=$busca->fetch_object();
?>

<form action="produto_recuperar_produto.php" method="POST">
    <table class="form">
        <tr><td>Nome <td> <input type="text" name="nomeproduto" id="nomeproduto" size="40" maxlength="40" value="<?php echo $reg->nomeproduto ?>" readonly>

        <tr><td>Categoria <td> <input type="text" name="categoria" id="categoria" size="40" maxlength="40" value="<?php echo $reg->nomecategoria ?>" readonly>

        <tr><td>Marca <td> <input type="text" name="marca" id="marca" size="40" maxlength="40" value="<?php echo $reg->nomemarca ?>" readonly>

        <tr><td>Valor <td> <input type="text" name="valor" id="valor" size="40" maxlength="40" value="<?php echo $reg->valor ?>" readonly>

        <tr><td>Descrição <td> <textarea name="descricao" id="descricao" rows="10" cols="42" maxlength="1000" readonly><?php echo $reg->descricao ?></textarea>             

        <tr><td><td><input class="botao" type="submit" value="Recuperar  Produto">

        <input type="hidden" name="cod" value="<?php echo $reg->codproduto ?>">

    </table> 
</form>