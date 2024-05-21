<h1>Novo Produto</h1>
<?php
    $q="select codcategoria, nomecategoria from categorias";
    $busca = $banco->query($q);
    
    $q2 = "select codmarca, nomemarca from marcas";
    $busca2 = $banco->query($q2);
?>

<form action="produto_new.php" method="POST">
    <table>
        <tr><td>Nome <td> <input type="text" name="nomeproduto" id="nomeproduto" size="40">
        <tr><td>Categoria <td><select name="categoria" id="categoria">
                            <?php
                                while($reg=$busca->fetch_object()){
                                    echo "<option value='$reg->codcategoria'>$reg->nomecategoria</option>";
                                }
                            ?>
                            </select>
        <tr><td>Marca <td><select name="marca" id="marca">
                            <?php
                                while($reg=$busca2->fetch_object()){
                                    echo "<option value='$reg->codmarca'>$reg->nomemarca</option>";
                                }
                            ?>
                            </select>

        <tr><td>Valor <td><input type="number" min="0" max="9999.99" step=".01" name="valor" id="valor">

        <tr><td>Descrição <td> <textarea name="descricao" id="descricao" rows="10" cols="42" maxlength="1000"></textarea>
        <tr><td>Imagem <td><input type="file" id="img" name="img">
        <tr><td><td><input class="botao" type="submit" value="Salvar Produto">
    </table>
</form>