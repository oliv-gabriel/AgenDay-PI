<?php
session_start();
include("conexao.php");


$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$duracao = mysqli_real_escape_string($conexao, trim($_POST['duracao']));
$preco = mysqli_real_escape_string($conexao, trim(($_POST['preco'])));
$descricao = mysqli_real_escape_string($conexao, trim(($_POST['descricao'])));

    $sql = "SELECT count(*) as total from servicos where nome_servico = '$nome'";
    $result = mysqli_query($conexao, $sql);
    
    
    $sql = "INSERT INTO `servicos`(`id_servicos`, `nome_servico`, `duracao_servico`, `preco_servico`, `descricacao_servico`)
     VALUES ('null','$nome','$duracao','$preco','$descricao')";
    
    if ($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }
    
    $conexao->close();
    
    header('Location: cad.servicos.php');
    exit;

