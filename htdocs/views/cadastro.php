<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
</head>
<body>
    <header>
        <h1>Cadastrar usuario</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post" onsubmit="return validarCamposCadastro(event);">
        <label for="nome">Nome</label>
        <br>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="email">Email</label>
        <br>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="senha">Senha</label>
        <br>
        <input type="password" name="senha" id="senha" required>
        <br>
        <br>
        <input type="hidden" name="rota" id="rota" value="cadastrar">
        <input type="submit" value="cadastrar">
    </main>
</body>
</html>