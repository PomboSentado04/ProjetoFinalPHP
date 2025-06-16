<?php
require_once 'functions.php';

//Verifica se o usuario está logado
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

//Filtros Strings e Time
$nome = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);

$artista = filter_var($_POST['artista'], FILTER_SANITIZE_SPECIAL_CHARS);

$album = filter_var($_POST['album'] ?? null, FILTER_SANITIZE_SPECIAL_CHARS);

$duracao = $_POST['duracao'];

$genero = filter_var($_POST['genero'], FILTER_SANITIZE_SPECIAL_CHARS);

require_once 'conexao.php';

$conn = conectarBanco();

$query = "INSERT INTO musicas (id_usuario, nome, artista, album, duracao, genero) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    header('location:../restrita.php');
    exit;
}

mysqli_stmt_bind_param($stmt, "ssssss", $_SESSION['id'], $nome, $artista, $album, $duracao, $genero);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header('location:../restrita.php');
?>