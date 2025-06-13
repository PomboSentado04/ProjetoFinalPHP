<?php

    function form_nao_enviado() {
        return $_SERVER['REQUEST_METHOD'] !== 'POST';
    }

    function campos_em_branco_login() {
    return empty($_POST['usuario']) || empty($_POST['senha']);
    }

    function campos_em_branco_cadastro() {
    return empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email']);
    }

?>