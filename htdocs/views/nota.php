<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nota</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true) {
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel();

    $idNota = intval($_GET['idNota']);
    $nota = $noticiaModel->buscarNota($idNota);
?>
<body>
    <header>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuAluno.html';
            }
        ?>
        <h1>Editar nota</h1>
    </header>
    <main>
        <h1><?= $nota->tituloNota; ?></h1>
        <p><?= $nota->usuario->nomeUsuario; ?></p>
        <p><?= $nota->conteudoNota; ?></p>
    </main>
</body>
</html>