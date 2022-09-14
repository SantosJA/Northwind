<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
<h1>Cadastro de produtos</h1>
<style> body { background-color: black;}  h1 { text-align: center; color: white;} h4 {color: white;} form {text-align: center;} </style>
<?php
if(isset($_POST['gravar'])){
    $sql = "INSERT INTO produtos(nome,caracteristicas,valor,categoria_id,estoque,imagem,resumo)
        values (:nome,:caracteristicas,:valor,:categoria_id,:estoque,:imagem,:resumo)";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute(array("nome" => $_POST['nome'],
    "valor" => $_POST['valor'],"caracteristicas"=> $_POST['caracteristica'],
    "categoria_id" => $_POST["categorias_produto"], "estoque"=> $_POST['estoque'],
    "imagem"=> $_POST['imagem'],
    "resumo"=> $_POST['resumo']));
}
?>
<form method="post">
    <h4>Nome:</h4> 
    <input type="text" name="nome" >
    <br>
    <h4>Características:</h4> 
    <input type="text" name="caracteristica" >
    <br>
    <h4>Categoria:</h4>
    <select name="categorias_produto">
        <?php
            $sql = "SELECT * from categorias";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch())
            {
                echo "<option value=\"{$linha['id']}\">{$linha['descricao']}</option>";
            }
        ?>
    </select>
    <h4>Valor:</h4>
    <input type="text" name="valor" >
    <br>
    <h4>Estoque:</h4> 
    <input type="text" name="estoque" >
    <br>
    <h4>Imagem:</h4> 
    <input type="text" name="imagem" >
    <br>
    <h4>Resumo:</h4> 
    <input type="text" name="resumo" >
    <br>
    <br>
    <br>
    <br>
    <input type="submit" name="gravar" >

</form>
</body>
</html>