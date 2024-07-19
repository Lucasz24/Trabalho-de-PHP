<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Nota</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel();

    $notas = $notaModel->buscarNota();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Listar nota</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->tituloNota; ?></td>
                        <td>
                            <a href="editarNota.php?idNota=<?= $nota->idNota; ?>">Editar</a>
                            <form action="../routers/notaRouter.php" method="post">
                                <input type="hidden" name="idNota" id="idNota" value="<?= $nota->idNota; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>