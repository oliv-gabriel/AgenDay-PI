<?php
session_start();
include("conexao.php");

$sql = "SELECT * FROM servicos ORDER BY id_servicos ASC ";
$result = $conexao->query($sql);








?>