<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ínicio</title>
</head>
<body><style> body{background-color: white;} </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php

    include_once('lib/conexao.php');
    include_once('lib/sql.php');
    include 'menu.php';
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_meulista')
    {
        include 'eco/lista.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_meucadastro')
    {
        include 'eco/cadastro.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_deleta')
    {
        include 'eco/deleta.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_atualiza')
    {  
        include 'eco/atualiza.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_categorias')
    {
        include 'eco/categorias.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_cadastroc')
    {
        include 'eco/cadastroc.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_deletac')
    {
        include 'eco/deletac.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_listac')
    {
        include 'eco/listac.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_acp')
    {
        include 'eco/atualizapai.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_dcp')
    {
        include 'eco/deletapai.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_categoriasc')
    {
        include 'eco/categoriasc.php';
    }
    if (isset($_GET['pagina']) & $_GET['pagina'] == 'p_atualizac')
    {
        include 'eco/atualizac.php';
    }