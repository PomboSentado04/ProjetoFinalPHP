<?php
    require_once 'includes/functions.php';
    sessaoIniciada();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Local -->
    <link href="css/estilo.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
    <div class="auth-container">
        <h1 class="auth-title"><i class="bi bi-person-fill"></i> Login</h1>
        
        <form action="includes/validarLogin.php" method="post" class="auth-form">
            <div class="form-group">
                <label for="login" class="form-label">Usuário:</label>
                <input type="text" class="form-control" id="login" name="login" required>
            </div>
            
            <div class="form-group">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            
            <button type="submit" class="btn btn-primary auth-btn">Entrar</button>
        </form>
        
        <a href="cadastro.php" class="auth-link">
            <i class="bi bi-person-plus"></i> Cadastrar novo usuário
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>