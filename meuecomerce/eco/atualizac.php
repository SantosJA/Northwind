<?php
    if(isset($_POST['atualizar']))
    {
        $sql = "UPDATE categorias SET descricao = :descricao, categoria_pai = :categoria_pai WHERE id = :id";
        $atualizar = $conn->prepare($sql);
        if($atualizar->execute(array(
            "descricao" => $_POST['descricao'],
            "categoria_pai"=> $_POST['categoria_pai'], 
            "id" => $_GET['id'])))
        {
            echo "Dados foram atualizados com sucesso! ";
        }
    }
?>    

<h1>Atualizar a Categoria</h1>
<?php
    $sql = "SELECT * FROM categorias where id = :id";
    $produto = $conn->prepare($sql);
    $produto->execute(array("id"=> $_GET['id']));
    $linha = $produto->fetch();

?>
<form method="post"><style>h4 {color: white;} h1{text-align: center; color: white;} body {background-color: black;} form{text-align: center;} </style>
<h4>Nome:</h4> 
    <input type="text" name="descricao" value="<?php echo $linha['descricao']; ?>" >
    <br>
    <h4>Categoria:</h4>
    <select name="categoria_pai" >
    <?php
            $sql = "SELECT * from categoria_pai";
            $consulta = $conn->prepare($sql);
            $consulta->execute();
            while ($grupo = $consulta->fetch()) {
                if ($grupo['codigo'] == $linha['categoria_pai'])
                {
                    echo "<option value=\"{$grupo['codigo']}\" selected>{$grupo['nome']}</option>";
                }
                else{
                    echo "<option value=\"{$grupo['codigo']}\">{$grupo['nome']}</option>";
            } 
        }  

        ?>
    </select>
    <br>
    <br>
    <br>
    <input type="submit" name="atualizar" value="Atualizar">
</form>