<?php
    if(isset($_POST['atualizar']))
    {
        $sql = "UPDATE produtos SET nome = :nome, caracteristicas = :caracteristicas, resumo = :resumo, imagem = :imagem, valor = :valor, categoria_id = :categoria_id, estoque = :estoque WHERE codigo = :codigo";
        $atualizar = $conn->prepare($sql);
        if($atualizar->execute(array(
            "nome" => $_POST['nome'],
            "valor" => $_POST['valor'],"caracteristicas"=> $_POST['caracteristica'],
            "categoria_id" => $_POST["categorias_produto"], "estoque"=> $_POST['estoque'],
            "imagem"=> $_POST['imagem'],
            "resumo"=> $_POST['resumo'], 
            "codigo" => $_GET['id'])))
        {
            echo "Dados foram atualizados com sucesso! ";
        }
    }
?>    

<h1>Atualizar o Produto</h1>
<?php
    $sql = "SELECT * FROM produtos where codigo = :codigo";
    $produto = $conn->prepare($sql);
    $produto->execute(array("codigo"=> $_GET['id']));
    $linha = $produto->fetch();

?>
<form method="post"><style>h4 {color: white;} h1{text-align: center; color: white;} body {background-color: black;} form{text-align: center;} </style>
<h4>Nome:</h4> 
    <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" >
    <br>
    <h4>Características:</h4> 
    <input type="text" name="caracteristica" value="<?php echo $linha['caracteristicas']; ?>" >
    <br>
    <h4>Categoria:</h4>
    <select name="categorias_produto" >
    <?php
            $sql = "SELECT * from categorias";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while ($grupo = $consulta->fetch()) {
                if ($grupo['id'] == $linha['categoria_id'])
                {
                    echo "<option value=\"{$grupo['id']}\" selected>{$grupo['descricao']}</option>";
                }
                else{
                    echo "<option value=\"{$grupo['id']}\">{$grupo['descricao']}</option>";
            } 
        }  

        ?>
    </select>
    <h4>Valor:</h4>
    <input type="text" name="valor" value="<?php echo $linha['valor']; ?>" >
    <br>
    <h4>Estoque:</h4> 
    <input type="text" name="estoque" value="<?php echo $linha['estoque']; ?>">
    <br>
    <h4>Imagem:</h4> 
    <input type="text" name="imagem" value="<?php echo $linha['imagem']; ?>">
    <br>
    <h4>Resumo:</h4> 
    <input type="text" name="resumo" value="<?php echo $linha['resumo']; ?>" >
    <br>
    <br>
    <br>
    <br>
    <input type="submit" name="atualizar" value="Atualizar">
</form>