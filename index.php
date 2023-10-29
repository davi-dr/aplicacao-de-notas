<?php require './funcoes.php';

$verify = isset($_POST['text']) && isset($_POST['color']) && $_SERVER["REQUEST_METHOD"] == "POST";

// Verifica se o formulário foi enviado
if ($verify) {
    // Recupera os valores dos campos do formulário
    $text = trim($_POST["text"]);
    $color = $_POST["color"];

    if (isset($_POST['id']) && !is_empty($_POST['id'])) {
        $id = $_POST['id'];
        alterarNota($id, $text, $color);
    } else {
        echo $text;
        inserirNota($text, $color);
    }

    header("Location: index.php");
    exit;
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    apagarNota($id);
}

$result = listarNotas();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Notes </title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="addNote-content">
            <div class="incon-plus">+</div>
            <span style="color: gray;"><b>Adicionar</b></span>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <form method="POST" action="index.php">
                    <textarea name="text" placeholder="Digite sua nota aqui..."></textarea>
                    <input type="text" hidden id="notaId" name="id">
                    <input type="text" hidden id="color" name="color">
                    <div class="submit-button">
                        <button type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <?php

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="content">
                <div class="item" style="background-color: <?= $row["color"] ?>">
                    <a href="index.php?delete=<?= $row["sticks_notas_id"] ?>"><span class="remove">X</span></a>
                    <textarea onclick="buscarNota(<?= $row['sticks_notas_id'] ?>,'<?= $row['description'] ?>', '<?= $row['color'] ?>');"><?= $row["description"] ?></textarea>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <script src="script.js"></script>


</body>

</html>