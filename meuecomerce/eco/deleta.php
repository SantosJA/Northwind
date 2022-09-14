<?php
    if(isset($_POST['deletar'])){
        $sql = "DELETE FROM produtos WHERE codigo = :codigo";
        $parse = $conn->prepare($sql);
        $parse->execute(array("codigo"=>$_GET['id']));
        header("Location: ?pagina=p_meulista");
    }
?>

<h1>Deletar Produtos</h1><style> table{color: white; background-color: black; border-color: red; text-align: center;margin: 0 auto;} body { background-color: white;}  h1 { text-align: center; color: black;} h4 {color: black;} form{text-align: center;} </style>
<?php
    $sql = "SELECT * FROM produtos p inner join categorias c on (p.categoria_id = c.id) where codigo = :codigo";
    $consulta = $conn->prepare($sql);
    $consulta->execute(array("codigo" => $_GET['id']));

    $linha = $consulta->fetch();
?>
<table border="1">
<tr>
        <td>Imagem</td>
        <td>Código</td>
        <td>Nome</td>
        <td>Características</td>
        <td>Categoria</td>
        <td>Valor</td>        
        <td>Estoque</td>        
        <td>Resumo</td>
</tr>
<tr>
    <td> <img src="<?php echo $linha['imagem']; ?>"></td>
    <td><?php echo $linha['id']; ?></td>
    <td><?php echo $linha['nome']; ?></td>
    <td><?php echo $linha['caracteristicas']; ?></td>
    <td><?php echo $linha['descricao']; ?></td>
    <td><?php echo $linha['valor']; ?></td>                    
    <td><?php echo $linha['estoque']; ?></td>
    <td><?php echo $linha['resumo']; ?></td>
</tr>
</table>
<br>
<br>
<form method="post">
    <input type="submit" name="deletar" value="Deletar">
    <br>
    
    <br>
    <a href="index.php">Voltar</a>
</form>
