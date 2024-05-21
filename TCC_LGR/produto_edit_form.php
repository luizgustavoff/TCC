<?php
$c = $_GET['cod'] ?? 0;

$q = "select p.codproduto, p.nomeproduto, p.categoria, p.marca, c.nomecategoria, m.nomemarca, p.descricao, p.valor, p.img
from produtos p
join categorias c on c.codcategoria=p.categoria
join marcas m on m.codmarca=p.marca
where p.codproduto=$c";
$busca = $banco->query($q);
$reg=$busca->fetch_object();

$q1="select codcategoria,nomecategoria from categorias";
$busca1 = $banco->query($q1);

$q2 = "select codmarca,nomemarca from marcas";
$busca2 = $banco->query($q2);

?>

<form action="produto_edit.php" method="POST">
    <table class="form">
        <tr><td>Nome <td> <input type="text" name="nomeproduto" id="nomeproduto" size="40" maxlength="40" value="<?php echo $reg->nomeproduto ?>">
        <tr><td>categoria <td><select name="categoria" id="categoria">
                            <?php
                                echo "<option value='$reg->categoria'>$reg->nomecategoria</option>";
                                while($reg1=$busca1->fetch_object()){
                                    echo "<option value='$reg1->codcategoria'>$reg1->nomecategoria</option>";
                                }
                            ?>
                            </select>
        <tr><td>Marca <td><select name="marca" id="marca">
                            <?php
                                echo "<option value='$reg->marca'>$reg->nomemarca</option>";
                                while($reg2=$busca2->fetch_object()){
                                    echo "<option value='$reg2->codmarca'>$reg2->nomemarca</option>";
                                }
                            ?>
                            </select>          
        <tr><td>Valor <td><input type="number" min="0" max="9999.99" step=".01" name="valor" id="valor" value="<?php echo $reg->valor; ?>">

        <tr><td>Descrição <td> <textarea name="descricao" id="descricao" rows="10" cols="42" maxlength="1000"><?php echo $reg->descricao ?></textarea>             
        <tr><td>Imagem <td><input type="file" id="novaimg" name="novaimg">                
        <tr><td><td><input class="botao" type="submit" value="Salvar Edição">
        <input type="hidden" name="img" value="<?php echo $reg->img ?>">
        <input type="hidden" name="cod" value="<?php echo $reg->codproduto ?>">
    </table> 
</form>