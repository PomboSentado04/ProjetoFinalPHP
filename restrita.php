<?php  
    require_once 'includes/functions.php';
    iniciarSessaoSegura()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Restrita</title>
</head>
<body>
    
    <nav>
        <a href="includes/logout.php" class="btn btn-outline-danger">Logout</a>
    </nav>

    <h2>Bem-vindo, <?=$_SESSION['login']?>!</h2>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <form action="includes/validarMusica.php" method="POST" class="container mt-5">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Música:</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="artista" class="form-label">Artista:</label>
            <input type="text" class="form-control" id="artista" name="artista" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label for="album" class="form-label">Álbum:</label>
            <input type="text" class="form-control" id="album" name="album" maxlength="50">
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração:</label>
            <input type="time" class="form-control" id="duracao" name="duracao" step="1" required>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero:</label>
            <input type="text" class="form-control" id="genero" name="genero" maxlength="50" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Música</button>
    </form>

    <!-- Bootstrap JS (opcional, apenas se usar componentes como dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <br><br>

    <?php

        $id = $_SESSION['id'];

        $query = "SELECT musicas.id, id_usuario, nome, artista, album, duracao, genero, data_criacao
          FROM musicas
          INNER JOIN usuarios ON musicas.id_usuario = usuarios.id 
          WHERE id_usuario = $id";

        require_once 'includes/conexao.php';

        $conn = conectarBanco();

        $resultado = mysqli_query($conn, $query); // Executa a consulta

        if (mysqli_num_rows($resultado) > 0) {
            echo "<h3>Minhas Músicas</h3>";
            echo "<table class='table table-striped'>"; // Usando Bootstrap para estilização
            echo "<thead>";
            echo    "<tr>";
            echo        "<th>Música</th>";
            echo        "<th>Artista</th>";
            echo        "<th>Álbum</th>";
            echo        "<th>Duração</th>";
            echo        "<th>Gênero</th>";
            echo        "<th>Data de Adição</th>";
            echo        "<th>Ações</th>";
            echo    "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($musica = mysqli_fetch_assoc($resultado)) {
                // Sanitiza os dados para evitar XSS
                $id_musica    = htmlspecialchars($musica['id']);
                $nome         = htmlspecialchars($musica['nome']);
                $artista      = htmlspecialchars($musica['artista']);
                $album        = htmlspecialchars($musica['album']);
                $duracao      = htmlspecialchars($musica['duracao']);
                $genero       = htmlspecialchars($musica['genero']);
                $data_criacao = date('d/m/Y H:i:s', strtotime($musica['data_criacao'])); // Formata a data

                echo "<tr>";
                echo    "<td>$nome</td>";
                echo    "<td>$artista</td>";
                echo    "<td>$album</td>";
                echo    "<td>$duracao</td>";
                echo    "<td>$genero</td>";
                echo    "<td>$data_criacao</td>";
                echo    "<td>";
                echo        "<a href='editarMusica.php?id=$id_musica' class='btn btn-sm btn-primary'>Editar</a> ";
                echo        "<a href='excluirMusica.php?id=$id_musica' class='btn btn-sm btn-danger'>Excluir</a>";
                echo    "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='text-muted'>Nenhuma música encontrada.</p>";
        }

        
    ?>

</body>
</html>