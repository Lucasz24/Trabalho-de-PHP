<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();

    $notaModel = new notaModel();

    $notas = $notaModel->buscarNota();
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
        <h1>Principal</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Usuario</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->tituloNota; ?></td>
                        <td><?= $nota->usuario->nomeUsuario; ?></td>
                        <td>
                            <a href="nota.php?idNota=<?= $nota->idNota; ?>">Abrir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>