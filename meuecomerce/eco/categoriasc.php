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
    $sql = "INSERT INTO categorias(descricao,categoria_pai)
        values (:descricao, :categoria_pai)";
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute(array("descricao" => $_POST['descricao'],
    "categoria_pai"=> $_POST['categoria_pai']));
}
?>
<form method="post">
    <h4>Descrição:</h4> 
    <input type="text" name="descricao" >
    <br>
    <h4>Categoria Pai:</h4>
    <select name="categoria_pai">
        <?php
            $sql = "SELECT * from categoria_pai";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while($linha = $consulta->fetch())
            {
                echo "<option value=\"{$linha['codigo']}\">{$linha['nome']}</option>";
            }
        ?>
    </select>
    <br>
    <br>
    <br>
    <br>
    <input type="submit" name="gravar" >

</form>
</body>
</html>