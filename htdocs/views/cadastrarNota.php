<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nota</title>
    <script type="text/javascript" src="../public/javascript/script.js"></script>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/alunoModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
        exit();
    }

    $alunoModel = new usuarioModel();

    $alunos = $alunoModel->buscarUsuario();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar notas</h1>
    </header>
    <main>
        <form action="../routers/notaRouter.php" method="post" onsubmit="return validarCamposCadastrarNota(event);">
            <label for="idUsuario">usuario</label>
            <br>
            <select name="idusuario" id="idUsuario">
                <option value="0">Selecione</option>
                <?php foreach ($usuarios as $usuario) :?>
                    <option value="<?= $usuario->idUsuario; ?>"><?= $usuario->nomeUsuario; ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="materia">Materia</label>
            <br>
            <input type="text" name="materia" id="materia" required>
            <br>
            <label for="conteudo">Conteúdo</label>
            <br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required></textarea>
            <br>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>