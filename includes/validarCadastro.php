<?php
    require_once 'functions.php';

    //Só aceita formulario enviado por método POST
    if (formNaoEnviado()) {
        header('location:../cadastro.php'); 
        exit;
    }

    //Verifica se tem algum campo em branco
    if (camposEmBrancoCadastro()) {
        header('location:../cadastro.php'); 
        exit;
    }

    // Verifica e sanatiza o login dado
    $login = filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    // Sanatiza o email dado
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Verifica o email dado
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location:../cadastro.php'); 
        exit;
    }

    // Filtra a senha dada
    $senha = trim($_POST['senha']);

    require_once 'conexao.php';

    // Conexão com banco
    $conn = conectarBanco();

    // Inicio da consulta
    $query = "SELECT id FROM usuarios WHERE login = ? OR email = ?";

    // Relaciona a consulta com o banco
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        header('location:../cadastro.php');
        exit;
    }

    mysqli_stmt_bind_param($stmt, "ss", $login, $email);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);

    // Verifica se há login ou email duplicado
    if (mysqli_stmt_num_rows($stmt) > 0) {
        header('location:../cadastro.php'); 
        exit;
    }

    // Obtem o hash da senha dada
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Requisição de registro no banco
    $query_insert = "INSERT INTO usuarios (login, email, senha) VALUES (?, ?, ?)";

    $stmt_insert = mysqli_prepare($conn, $query_insert);

    if (!$stmt_insert) {
        header('location:../cadastro.php');
        exit;
    }

    mysqli_stmt_bind_param($stmt_insert, "sss", $login, $email, $senha_hash);

    mysqli_stmt_execute($stmt_insert);

    mysqli_stmt_close($stmt_insert);

    // Inicio da consulta
    $query = "SELECT * FROM usuarios WHERE login = ?";

    // Relaciona a consulta com o banco
    $stmt_final = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt_final, "s", $login);

    $resultado = mysqli_stmt_execute($stmt_final);

    if (!$resultado) {
        header('location:../index.php');
        exit;
    }

    // Dados do banco são pegos e armazenados em variaveis, com base no login verificado anteriormente
    mysqli_stmt_bind_result($stmt_final, $login_id, $login_usuario, $login_senha, $login_email);

    mysqli_stmt_fetch($stmt_final);

    // Inicia uma sessão
    session_start();
    
    // Os dados são guardados em variaveis da sessão, menos a senha(por motivos de segurança).
    $_SESSION['id']         = $login_id;
    $_SESSION['usuario']    = $login_usuario;
    $_SESSION['email']      = $login_email;

    header('location:../restrita.php');
?>