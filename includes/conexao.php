<?php

// Função para conectar ao banco

function conectarBanco() {
    $servidor = 'localhost'; 
    $usuario  = 'root';           
    $senha    = '';               
    $banco    = 'projetofinalphp'; 

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$conn) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    mysqli_set_charset($conn, "utf8mb4");

    return $conn;
}

?>