<?php

    require_once 'includes/functions.php';

    // Verifica se o usuario está logado
    iniciarSessaoSegura();

    // Verifica se o id foi fornecido
    if (!isset($_GET['id'])) {
        header('location:restrita.php');
        exit;
    }

    // Verifica se o id do usuario é igual ao id_usuario no registro da musica
    if(!verificarIdUsuario($_GET['id'])) {
        header('location:restrita.php');
        exit;
    }

    // Converte para inteiro por segurança
    $id_musica = intval($_GET['id']);

    // Requisição de Delete
    $query = "DELETE FROM musicas WHERE id = ?";

    // Chama conecta o banco de dados
    require_once 'includes/conexao.php';

    $conn = conectarBanco();

    // Vincula a requisição ao banco de dados
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        header('location:restrita.php');
        exit();
    }

    // Vincula parâmetro e executa
    mysqli_stmt_bind_param($stmt, "i", $id_musica);
    mysqli_stmt_execute($stmt);

    // Verifica se deletou
    if (mysqli_stmt_affected_rows($stmt) <= 0) {
        header('Location: restrita.php?erro=musica_nao_encontrada');
        exit();
    }

    // Fecha conexões
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('location:restrita.php');
?>