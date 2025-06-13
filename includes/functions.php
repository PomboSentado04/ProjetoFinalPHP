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

?>