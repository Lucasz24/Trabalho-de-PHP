<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuario</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
        exit();
    }
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar usuario</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposCadastrarUsuario(event);">
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome" required>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>