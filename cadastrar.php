<?php
session_start();
include("conexao.php");


$estabelecimento = mysqli_real_escape_string($conexao, trim($_POST['estabelecimento']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "SELECT count(*) as total from estabelecimento where nome_estabelecimento = '$estabelecimento'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: index.php');
	exit;
}

$sql = "INSERT INTO `estabelecimento`(`id_estabelecimento`, `nome_estabelecimento`, `email_estabelecimento`, `contato_estabelecimento`, `senha_estabelecimento`, `arquivo_servicos`)
 VALUES (NULL, '$estabelecimento','$email', NULL, '$senha', NULL);";

if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();


header('Location: index.php');
exit;
