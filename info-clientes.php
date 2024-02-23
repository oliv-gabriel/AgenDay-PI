<?php
session_start();
include("conexao.php");

$sql = "SELECT * FROM clientes ORDER BY id_cliente ASC ";
$result = $conexao->query($sql);








?>