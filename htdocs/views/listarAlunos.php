<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alunos</title>
</head>
<body>
    <?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: login.php');
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();
    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
    ?>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Listar Usuários</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tiposUsuario as $usuario) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                            <a href="deletar.php?id=<?php echo $usuario['id']; ?>">Deletar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
