<?php
    require_once 'includes/functions.php';

    if (formNaoEnviado()) {
        header('location:index.php'); 
        exit;
    }

    
    if (camposEmBrancoLogin()) {
        header('location:index.php'); 
        exit;
    }

?>