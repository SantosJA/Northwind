<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
<h1>Listagem de produtos</h1>
<table border="1" class="fds"><style> .fds { color: white; background-color: black; border-color: red; text-align: center;margin: 0 auto;} body {background-color: white; } h1 { text-align: center; color: black;}</style>
    <tr>
        <td>Imagem</td>
        <td>Código</td> 
        <td>Nome</td>
        <td>Características</td>
        <td>Categoria</td>
        <td>Valor</td>        
        <td>Estoque</td>
        <td>Resumo</td>
        <td>Atualizar</td>
        <td>Deletar</td>
    </tr>
<?php
    $sql = "SELECT p.codigo, p.nome, p.estoque, p.imagem, p.resumo, p.caracteristicas, p.valor, c.descricao from produtos p inner join categorias c on (p.categoria_id = c.id)" ;
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
    foreach($consulta as $linha) {
            ?>
                <tr>
                    <td> <img src="<?php echo $linha['imagem']; ?>"></td>
                    <td><?php echo $linha['codigo']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['caracteristicas']; ?></td>   
                    <td><?php echo $linha['descricao']; ?></td>
                    <td><?php echo $linha['valor']; ?></td>                    
                    <td><?php echo $linha['estoque']; ?></td>                    
                    <td><?php echo $linha['resumo']; ?></td>
                    <td><?php echo "<a href=\"?pagina=p_atualiza&id={$linha ['codigo']}\">Atualizar</a>"; ?></td>
                    <td><?php echo " <a href=\"?pagina=p_deleta&id={$linha['codigo']}\">Deletar</a>"; ?></td>
                </tr>
<?php
    }
    ?>

</table>
</body>
</html>