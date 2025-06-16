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

    function iniciarSessaoSegura() {
        session_start();
        if (!isset($_SESSION['login']) || !isset($_SESSION['email'])) {
            header('location:index.php');
        }
    }

?>