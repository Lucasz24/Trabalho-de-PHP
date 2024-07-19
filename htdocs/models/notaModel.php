<?php
    require_once 'DAL/notaDAO.php';
    require_once 'alunoModel.php';

    class notaModel {
        public ?int $idNota;
        public ?int $idAluno;
        public ?string $tituloNota;
        public ?string $conteudoNota;
        public ?usuarioModel $aluno;

        public function __construct(?int $idNota = null, ?int $idAluno = null, ?string $tituloNota = null, ?string $conteudoNota = null, ?usuarioModel $aluno = null)
        {
            $this->idNota = $idNota;
            $this->idAluno = $idAluno;
            $this->tituloNota = $tituloNota;
            $this->conteudoNota = $conteudoNota;
            $this->aluno = $aluno;
        }

        public function cadastrarNota(notaModel $nota) {
            $notaDAO = new notaDAO();

            return $notaDAO->cadastrarNota($nota);
        }

        public function buscarNotas() {
            $notaDAO = new notaDAO();
            $alunoModel = new alunoModel();

            $notas = $notaDAO->buscarNotas();
        
            foreach ($notas as $chave => $nota) {
                $nota[$chave] = new notaModel(
                    $nota['idNota'],
                    $nota['idAluno'],
                    $nota['tituloNoticia'],
                    $nota['conteudoNoticia'],
                    $alunoModel->buscarAlunoPorId($nota['idAluno'])
                );
            }

            return $notas;
        }

        public function buscarNotaPorId(int $idNota) {
            $notaDAO = new notaDAO();
            $alunoModel = new alunoModel();

            $nota = $notaDAO->buscarNotaPorId($idNota);

            $nota = new notaModel(
                $nota['idNoticia'],
                $nota['idAutor'],
                $nota['tituloNoticia'],
                $nota['conteudoNoticia'],
                $alunoModel->buscarAlunoPorId($nota['idAluno'])
            );

            return $nota;
        }

        public function excluirNota(int $idNota) {
            $notaDAO = new notaDAO();

            return $notaDAO->excluirNota($idNota);
        }

        public function atualizarNota(notaModel $nota) {
            $notaDAO = new notaDAO();

            return $notaDAO->atualizarNota($nota);
        }
    }
?>