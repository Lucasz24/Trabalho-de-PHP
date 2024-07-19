<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel();
    $usuarioModel = new UsuarioModel();

    $idNota = intval($_GET['idNota']);

    $usuario= $usuarioModel->buscarUsuarioPorId($idUsuario);
    $alunos = $alunosModel->buscarUsuario();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar nota</h1>
    </header>
    <main>
    <form action="../routers/notaRouter.php" method="post" onsubmit="return validarCamposCadastrarNota(event);">
            <label for="idUsuario">Usuario</label>
            <br>
            <select name="idUsuario" id="idUsuario">
                <option value="0">Selecione</option>
                <?php foreach ($usuarios as $usuario) :?>
                    <?php if ($usuario->idUsuario == $nota->idUsuario) :?>
                    <option value="<?= $usuario->idUsuario; ?>" selected><?= $usuario->nomeUsuario; ?></option>
                    <?php else :?>
                        <option value="<?= $usuario->idUsuario; ?>"><?= $usuario->nomeUsuario; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="materia">Materia</label>
            <br>
            <input type="text" name="materia" id="materia" value="<?= $nota->materiaNota; ?>" required>
            <br>
            <label for="conteudo">Conteúdo</label>
            <br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required><?= $nota->materiaNota; ?></textarea>
            <br>
        </form>
    </main>
</body>
</html>