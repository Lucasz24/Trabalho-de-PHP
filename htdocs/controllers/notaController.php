<?php
    require_once '../models/notaModel.php';

    class notaController {
        public function cadastrarNota(int $idUsuario, string $tituloNota, string $conteudoNota) {
            $notaModel = new notaModel();

            $nota = new notaModel(null, $idUsuario, $tituloNota, $conteudoNota);

            $retorno = $notaModel->cadastrarNota($nota);

            if ($retorno) {
                header('Location: ../views/principal.php');
            }
            else {
                header('Location: ../views/cadastrarNota.php');
            }

            exit();
        }

        public function excluirNota(int $idNota) {
            $notaModel = new notaModel();

            $notaModel->excluirNota($idNota);

            header('Location: ../views/principal.php');
            exit();
        }

        public function atualizarNota(int $idNota, int $idUsuario, string $titulo, string $materia) {
            $notaModel = new notaModel();

            $nota = new notaModel($idNota, $idUsuario, $titulo, $materia);

            $retorno = $notaModel->atualizarNota($nota);

            if ($retorno) {
                header('Location:../views/listarNota.php');
            }
            else {
                header("Location:../views/editarNota.php=$idNota");
            }

            exit();
            
        }
    }
?>