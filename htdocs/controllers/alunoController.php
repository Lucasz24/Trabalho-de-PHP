<?php
    require_once '../models/usuarioModel.php';

    class autorController {
        public function cadastrarUsuario(string $nome) {
            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, $nome);

            $retorno = $usuarioModel->cadastrarUsuario($nome);

            if ($retorno) {
                header('Location: ../views/cadastrarNota.php');
            }
            else {
                header('Location: ../views/cadastrarAluno.php');
            }

            exit();
        }
    }
?>