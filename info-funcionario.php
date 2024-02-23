<?php
session_start();
include("conexao.php");

$sql = "SELECT * FROM funcionarios ORDER BY id_funcionario ASC ";
$result = $conexao->query($sql);








?>