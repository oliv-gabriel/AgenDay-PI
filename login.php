<?php
session_start();
include('conexao.php');

if(empty($_POST['email'])|| empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id_estabelecimento, nome_estabelecimento from estabelecimento where email_estabelecimento = '{$email}' and senha_estabelecimento = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['email_estabelecimento'] = $email;
    header('Location: agenda.php');
    exit();
} else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();

}



