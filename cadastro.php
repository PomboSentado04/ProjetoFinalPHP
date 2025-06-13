<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>

    <form action="validarCadastro.php" method="POST">
        
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
    
    
    
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
    
    
    
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        
        <button type="submit">Cadastrar</button>
    </form>
    
    <p><a href="index.php">Voltar para Login</a></p>
    
</body>
</html>