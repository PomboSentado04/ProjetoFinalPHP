<?php
require_once 'functions.php';
iniciarSessaoSegura();

//Só aceita formulario enviado por método POST
if (formNaoEnviado()) {
    header('location:../index.php'); 
    exit;
}

//Verifica se tem algum campo em branco
if (camposEmBrancoMusica()) {
    header('location:../index.php'); 
    exit;
}

// Verifica permissão novamente (segurança extra)
if (!verificarIdUsuario($_POST['id_musica'])) {
    header('location:../restrita.php');
    exit;
}

// Prepara os dados
$id_musica = intval($_POST['id_musica']);
$nome = trim($_POST['nome']);
$artista = trim($_POST['artista']);
$album = isset($_POST['album']) ? trim($_POST['album']) : null;
$duracao = $_POST['duracao'];
$genero = trim($_POST['genero']);

// Validações básicas
if (empty($nome) || empty($artista) || empty($duracao) || empty($genero)) {
    header('location:../restrita.php');
    exit;
}

// Atualiza no banco de dados
require_once 'conexao.php';
$conn = conectarBanco();

$query = "UPDATE musicas SET nome = ?, artista = ?, album = ?, duracao = ?, genero = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sssssi", $nome, $artista, $album, $duracao, $genero, $id_musica);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    header('location:../restrita.php');
} else {
    header('location:../restrita.php');
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
header('location:../restrita.php');
?>