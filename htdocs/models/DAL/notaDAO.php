<?php
    require_once 'conexao.php';

    class noticiaDAO {
        public function cadastrarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO noticia VALUES(null, :idUsuario, :tituloNota, :conteudoNota);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idUsuario', $nota->idUsuario);
            $stmt->bindParam(':tituloNota', $nota->tituloNota);
            $stmt->bindParam(':conteudoNota', $nota->conteudoNota);
            return $stmt->execute();
        }

        public function buscarNota() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM nota;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarNotaPorId(int $idNota) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM nota WHERE idNota = :idNota;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idNota', $idNota);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirNota(int $idNota) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM nota WHERE idNota = :idNota";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idNota', $idNota);
            return  $stmt->execute();
        }

        public function atualizarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE nota SET idUsuario = :idUsuario, tituloNota = :tituloNota, conteudoNota = :conteudoNota WHERE idNota = :idNota;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idUsuario', $nota->idUsuario);
            $stmt->bindValue(':tituloNota', $nota->tituloNota);
            $stmt->bindValue(':idNota', $nota->idNota);

            return $stmt->execute();
          }
    }
?>