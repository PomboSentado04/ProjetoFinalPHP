<?php
require_once 'includes/functions.php';

// Verifica se o usuário está logado
iniciarSessaoSegura();

// Verifica se o id foi fornecido
if (!isset($_GET['id'])) {
    header('Location: restrita.php');
    exit;
}

// Verifica se o id do usuario é igual ao id_usuario no registro da musica
if (!verificarIdUsuario($_GET['id'])) {
    header('Location: restrita.php');
    exit;
}

// Converte para inteiro para segurança
$id_musica = intval($_GET['id']);

// Obtém os dados atuais da música
require_once 'includes/conexao.php';
$conn = conectarBanco();

$query = "SELECT nome, artista, album, duracao, genero FROM musicas WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_musica);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) === 0) {
    header('Location: restrita.php');
    exit;
}

$musica = mysqli_fetch_assoc($resultado);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Música</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Música</h2>
        
        <form action="includes/validarEdicaoMusica.php" method="POST">
            <input type="hidden" name="id_musica" value="<?= $id_musica ?>">
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Música:</label>
                <input type="text" class="form-control" id="nome" name="nome" 
                       value="<?= htmlspecialchars($musica['nome']) ?>" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label for="artista" class="form-label">Artista:</label>
                <input type="text" class="form-control" id="artista" name="artista" 
                       value="<?= htmlspecialchars($musica['artista']) ?>" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label">Álbum:</label>
                <input type="text" class="form-control" id="album" name="album" 
                       value="<?= htmlspecialchars($musica['album']) ?>" maxlength="50">
            </div>

            <div class="mb-3">
                <label for="duracao" class="form-label">Duração:</label>
                <input type="time" class="form-control" id="duracao" name="duracao" 
                       value="<?= htmlspecialchars($musica['duracao']) ?>" step="1" required>
            </div>

            <div class="mb-3">
                <label for="genero" class="form-label">Gênero:</label>
                <input type="text" class="form-control" id="genero" name="genero" 
                       value="<?= htmlspecialchars($musica['genero']) ?>" maxlength="50" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="restrita.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>