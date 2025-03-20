<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comentario = htmlspecialchars($_POST["comentario"]) . "\n";
    file_put_contents("comentarios.txt", $comentario, FILE_APPEND);
}
$comentarios = file_exists("comentarios.txt") ? file("comentarios.txt") : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Comentários</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f2f2f2; }
        .container { width: 50%; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        textarea { width: 90%; height: 100px; margin-bottom: 10px; }
        button { padding: 10px 20px; background: blue; color: white; border: none; cursor: pointer; }
        .comment-box { margin-top: 10px; padding: 10px; background: #ddd; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Seção de Comentários</h2>
        <form method="POST">
            <textarea name="comentario" placeholder="Digite seu comentário"></textarea><br>
            <button type="submit">Enviar</button>
        </form>
        <div>
            <h3>Comentários:</h3>
            <?php foreach ($comentarios as $c) { echo "<div class='comment-box'>" . nl2br($c) . "</div>"; } ?>
        </div>
    </div>
</body>
</html>
