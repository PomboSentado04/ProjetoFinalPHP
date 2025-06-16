<?php  
    require_once 'includes/functions.php';
    iniciarSessaoSegura()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restrita</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Área Restrita</a> | 
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Bem-vindo, <?=$_SESSION['login']?>!</h2>

</body>
</html>