<?php

    include_once 'autoload.php';
    protegeArquivo(basename(__FILE__));

    class DaoProjeto {

        private static $instance;

        private function __construct() { }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new DaoProjeto();
            }

            return self::$instance;
        }

        public function inserir (Projeto $projeto) {
            try{
                $sql = "INSERT INTO projeto(id_voluntaria, titulo_projeto, descricao) VALUES (?, ?, ?)";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $projeto->getIdVoluntaria(), PDO::PARAM_INT);
                $conexao->bindValue(2, $projeto->getTitulo(), PDO::PARAM_STR);
                $conexao->bindValue(3, $projeto->getDescricao(), PDO::PARAM_STR);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Inserido com sucesso </div>';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao inserir </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }

        }

        public function editar (Projeto $projeto) {
            try{
                $sql = "UPDATE projeto set titulo_projeto = ?, descricao = ? WHERE id_projeto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $projeto->getTitulo(), PDO::PARAM_STR);
                $conexao->bindValue(2, $projeto->getDescricao(), PDO::PARAM_STR);
                $conexao->bindValue(3, $projeto->getId(), PDO::PARAM_INT);
                $conexao->execute();
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/projetos/list">';
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }

        }

        public function deletar (int $id) {
            try{
                $sql = "DELETE FROM projeto WHERE id_projeto = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $id, PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/projetos/list">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao deletar </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }

        public function listarTodos () {
            $id_user = $_SESSION['id_user'];
            $sql = "SELECT * FROM projeto WHERE id_voluntaria = $id_user ORDER BY id_projeto DESC";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetchAll(PDO::FETCH_OBJ);
        }

        public function listarPorID (int $id) {
            $sql = "SELECT * FROM projeto WHERE id_projeto = $id";
            $conexao = Conexao::getInstance()->query($sql);
            return $conexao->fetch(PDO::FETCH_OBJ);
        }
    }