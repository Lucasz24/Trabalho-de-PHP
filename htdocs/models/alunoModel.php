<?php
require_once 'DAL/usuarioDAO.php';

class usuarioModel {
    public ?int $idUsuario;
    public ?string $nomeUsuario;

    public function __construct(?int $idUsuario = null, ?string $nomeUsuario = null)
    {
        $this->idUsuario = $idUsuario;
        $this->nomeUsuario = $nomeUsuario;
    }

    public function buscarUsuarioPorId(int $idUsuario) {
        $usuarioDAO = new usuarioDAO();
        
        $usuario = $usuarioDAO->buscarUsuarioPorId($idUsuario);

        if ($usuario) {
            return new usuarioModel($usuario['idUsuario'], $usuario['nomeUsuario']);
        } else {
            return null; 
        }
    }

    public function buscarUsuario() {
        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->buscarUsuario();
        $usuarios = [];

        foreach ($usuarios as $usuario) {
            $usuario = new usuarioModel($usuario['idUsuario'], $usuario['nomeUsuario']);
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function cadastrarUsuario() {
        $usuarioDAO = new usuarioDAO();

        return $usuarioDAO->cadastrarUsuario($this->idUsuario, $this->nomeUsuario);
    }
    
    public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
        $usuarioDAO = new usuarioDAO();
        $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($email, $senha);
    
        return $retorno;
    }

    public function inserirUsuario(string $nome, string $email, string $senha) {
        $usuarioDAO = new usuarioDAO();
        $retorno = $usuarioDAO->inserirUsuario($nome, $email, $senha);

        return $retorno;
    }
}
?>