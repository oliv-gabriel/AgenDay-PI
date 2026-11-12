<?php
session_start();
include("conexao.php");

$tipo_usuario = $_POST['tipo_usuario'] ?? 'cliente';
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome'] ?? $_POST['estabelecimento'] ?? ''));
$contato = mysqli_real_escape_string($conexao, trim($_POST['contato'] ?? ''));
$email = mysqli_real_escape_string($conexao, trim($_POST['email'] ?? ''));
$senha_raw = $_POST['senha'] ?? '';
$repita_senha_raw = $_POST['repita_senha'] ?? '';

if (empty($nome) || empty($email) || empty($senha_raw) || empty($repita_senha_raw)) {
	header('Location: index.php');
	exit;
}

if ($senha_raw !== $repita_senha_raw) {
	$_SESSION['senhas_diferentes'] = true;
	$_SESSION['dados_cadastro'] = [
		'tipo_usuario' => $tipo_usuario,
		'nome' => $nome,
		'contato' => $contato,
		'email' => $email
	];
	header('Location: index.php');
	exit;
}

$senha = mysqli_real_escape_string($conexao, trim(md5($senha_raw)));

if ($tipo_usuario === 'empresa') {
	$sql = "SELECT count(*) as total from estabelecimento where nome_estabelecimento = '$nome' OR email_estabelecimento = '$email'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['total'] > 0) {
		$_SESSION['usuario_existe'] = 'Nome de estabelecimento ou e-mail já existente!';
		$_SESSION['dados_cadastro'] = [
			'tipo_usuario' => 'empresa',
			'nome' => $nome,
			'contato' => $contato,
			'email' => $email
		];
		header('Location: index.php');
		exit;
	}

	$sql = "INSERT INTO `estabelecimento`(`id_estabelecimento`, `nome_estabelecimento`, `email_estabelecimento`, `contato_estabelecimento`, `senha_estabelecimento`, `arquivo_servicos`)
	 VALUES (NULL, '$nome', '$email', '$contato', '$senha', NULL);";

	if ($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
		unset($_SESSION['dados_cadastro']);
	}
} else {
	$sql = "SELECT count(*) as total from clientes where email_cliete = '$email'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['total'] > 0) {
		$_SESSION['usuario_existe'] = 'E-mail de cliente já cadastrado!';
		$_SESSION['dados_cadastro'] = [
			'tipo_usuario' => 'cliente',
			'nome' => $nome,
			'contato' => $contato,
			'email' => $email
		];
		header('Location: index.php');
		exit;
	}

	$sql = "INSERT INTO `clientes`(`id_cliente`, `nome_cliente`, `email_cliete`, `contato_cliente`, `senha_cliente`, `arquivo_cliente`)
	 VALUES (NULL, '$nome', '$email', '$contato', '$senha', NULL);";

	if ($conexao->query($sql) === TRUE) {
		$_SESSION['status_cadastro'] = true;
		unset($_SESSION['dados_cadastro']);
	}
}

$conexao->close();

header('Location: index.php');
exit;
