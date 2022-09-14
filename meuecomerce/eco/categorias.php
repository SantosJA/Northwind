<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
<h1>Listagem de categorias</h1>
<table border="1" class="fds"><style> .fds { color: white; background-color: black; border-color: red; text-align: center;margin: 0 auto;} body {background-color: white; } h1 { text-align: center; color: black;}</style>
    <tr>
        <td>Código</td>
        <td>Categoria</td>
        <td>Categoria Pai</td>
        <td>Atualizar</td>
        <td>Deletar</td>
    </tr>
<?php
    $sql = "SELECT c.id, c.descricao, cp.nome from categorias c inner join categoria_pai cp on (c.categoria_pai = cp.codigo)" ;
    $consulta = $conn->prepare($sql);
    $resultado = $consulta->execute();
    foreach($consulta as $linha) {
            ?>
                <tr>
                    <td><?php echo $linha['id']; ?></td> 
                    <td><?php echo $linha['descricao']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo "<a href=\"?pagina=p_atualizac&id={$linha['id']}\">Atualizar</a>"; ?></td>
                    <td><?php echo " <a href=\"?pagina=p_deletac&id={$linha['id']}\">Deletar</a>"; ?></td>
                </tr>
<?php
    }
    ?>

</table>
</body>
</html>