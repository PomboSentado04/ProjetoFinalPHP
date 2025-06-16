<?php
function formNaoEnviado() {
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function camposEmBrancoLogin() {
    return empty($_POST['login']) || empty($_POST['senha']);
}

function camposEmBrancoCadastro() {
    return empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['email']);
}

function camposEmBrancoMusica() {
    return empty($_POST['nome']) || empty($_POST['artista']) || empty($_POST['duracao']) || empty($_POST['genero']);
}

// Impede que usuarios não logados acessem algumas paginas
function iniciarSessaoSegura() {
    session_start();
    if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
        header('location:index.php');
    }
}

// Impede que usuarios já logados acessem algumas paginas
function sessaoIniciada() {
    session_start();
    if (isset($_SESSION['login']) && isset($_SESSION['email'])) {
        header('location:restrita.php');
    }
}

// Verifica se o Id do usuario logado é o mesmo no item acessado
function verificarIdUsuario($id_musica) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $id_musica = intval($id_musica);
    $id_usuario = intval($_SESSION['id']);

    require_once 'conexao.php';
    $conn = conectarBanco();

    $query = "SELECT id_usuario FROM musicas WHERE id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        header('location:restrita.php');
        exit;
    }

    // Vincula parâmetros e executa
    mysqli_stmt_bind_param($stmt, "i", $id_musica);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_dono);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    // Fecha a conexão
    mysqli_close($conn);
    
    // Retorna true se o dono for o usuário logado
    return ($id_dono == $id_usuario);
}
?>