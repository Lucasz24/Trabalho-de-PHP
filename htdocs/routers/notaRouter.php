<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../controllers/usuarioController.php';

    $usuarioController = new usuarioController();

    if (isset($_POST['rota'])) {
        $rota = $_POST['rota'];

        switch ($rota) {
            case "entrar":

                if (isset($_POST['email']) && isset($_POST['senha'])) {
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    $usuarioController->validarUsuario($email, $senha);
                } else {
                    echo "Erro: campos 'email' e 'senha' são obrigatórios para a rota 'entrar'.";
                }
                break;
            case "cadastrar":

                if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];

                    $usuarioController->cadastrarUsuario($nome, $email, $senha);
                } else {
                    echo "Erro: campos 'nome', 'email' e 'senha' são obrigatórios para a rota 'cadastrar'.";
                }
                break;
            default:
                echo "Rota inválida.";
        }
    } else {
        echo "Erro: a rota não foi enviada.";
    }
} else {
    echo "Erro: método de requisição inválido.";
}
?>