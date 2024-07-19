<?php
require_once 'conexao.php';

class UsuarioDAO {
    public function buscarUsuarioPorId(int $idUsuario) {
        $conexao = (new Conexao())->getConexao();

        $sql = "SELECT * FROM usuario WHERE idUsuario = :idUsuario;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarUsuario() {
        $conexao = (new Conexao())->getConexao();

        $sql = "SELECT * FROM usuario;";

        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarUsuario($usuario) {
        $conexao = (new Conexao())->getConexao();

        $sql = "INSERT INTO usuario VALUES(null, :nomeUsuario);";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':nomeUsuario', $usuario->nomeUsuario);
        return $stmt->execute();
    }
}
?>