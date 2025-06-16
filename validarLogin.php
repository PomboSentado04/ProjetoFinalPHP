<?php
    require_once 'includes/functions.php';

    //Só aceita formulario enviado por método POST
    if (formNaoEnviado()) {
        header('location:index.php'); 
        exit;
    }

    //Verifica se tem algum campo em branco
    if (camposEmBrancoLogin()) {
        header('location:index.php'); 
        exit;
    }

    //Método mais moderno de filtro
    $login = filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS);

    // Filtro para senha
    $senha = trim($_POST['senha']);

    require_once 'includes/conexao.php';

    // Conexão com banco
    $conn = conectarBanco();

    // Inicio da consulta
    $query = "SELECT * FROM usuarios WHERE login = ?";

    // Relaciona a consulta com o banco
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        header('location:index.php');
        exit;
    }

    mysqli_stmt_bind_param($stmt, "s", $login);

    $resultado = mysqli_stmt_execute($stmt);

    if (!$resultado) {
        header('location:index.php');
        exit;
    }

    mysqli_stmt_store_result($stmt);

    // Verifica se há linhas afetadas
    $linhas = mysqli_stmt_num_rows($stmt);

    if ($linhas <= 0) {

        header('location:index.php'); 
        exit;
    }

    // Dados do banco são pegos e armazenados em variaveis, com base no login verificado anteriormente
    mysqli_stmt_bind_result($stmt, $login_id, $login_usuario, $login_senha, $login_email);

    mysqli_stmt_fetch($stmt);

    // Verifica se senha dada bate com a senha hash vinda do servidor
    if (!password_verify($senha, $login_senha)) {
        header('location:index.php');
        exit;
    }

    // Inicia uma sessão
    session_start();
    
    // Os dados são guardados em variaveis da sessão, menos a senha(por motivos de segurança).
    $_SESSION['id']         = $login_id;
    $_SESSION['login']    = $login_usuario;
    $_SESSION['email']      = $login_email;

    header('location:restrita.php');

?>