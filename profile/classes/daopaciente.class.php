<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoPaciente {

    private static $instance;

    private function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoPaciente();
        }

        return self::$instance;
    }

    public function inserir (Paciente $paciente) {
        try{
            $sql = "INSERT INTO paciente() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $paciente->getNome(), PDO::PARAM_STR);
            $conexao->bindValue(2, $paciente->getRua(), PDO::PARAM_STR);
            $conexao->bindValue(3, $paciente->getNumeroCasa(), PDO::PARAM_STR);
            $conexao->bindValue(4, $paciente->getTelefone(), PDO::PARAM_STR);
            $conexao->bindValue(5, $paciente->getCelular(), PDO::PARAM_STR);
            $conexao->bindValue(6, $paciente->getCpf(), PDO::PARAM_STR);
            $conexao->bindValue(7, $paciente->getRg(), PDO::PARAM_STR);
            $conexao->bindValue(8, $paciente->getSexo(), PDO::PARAM_STR);
            $conexao->bindValue(9, $paciente->getStatus(), PDO::PARAM_STR);
            $conexao->bindValue(10, $paciente->getNascimento(), PDO::PARAM_STR);
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

    public function listarTodos () {
        $sql = "SELECT * FROM paciente ORDER BY id_paciente DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarPorID ($id) {
        $sql = "SELECT * FROM paciente WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function deletar ($id) {
        try{
            $sql = "DELETE FROM paciente WHERE id_paciente = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/paciente/list">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Erro, deve-se primeiro apagar o paciente em todas as áreas e suas respectivas consultas. </div>';
        }

    }

    public function editar (Paciente $paciente) {
        try{
            $sql = "UPDATE paciente set nome_paciente = ?, rua = ?, numero = ?, telefone = ?, celular = ?, cpf = ?, rg = ?, sexo = ?,
                                    status = ?, nascimento = ? WHERE id_paciente = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $paciente->getNome(), PDO::PARAM_STR);
            $conexao->bindValue(2, $paciente->getRua(), PDO::PARAM_STR);
            $conexao->bindValue(3, $paciente->getNumeroCasa(), PDO::PARAM_STR);
            $conexao->bindValue(4, $paciente->getTelefone(), PDO::PARAM_STR);
            $conexao->bindValue(5, $paciente->getCelular(), PDO::PARAM_STR);
            $conexao->bindValue(6, $paciente->getCpf(), PDO::PARAM_STR);
            $conexao->bindValue(7, $paciente->getRg(), PDO::PARAM_STR);
            $conexao->bindValue(8, $paciente->getSexo(), PDO::PARAM_STR);
            $conexao->bindValue(9, $paciente->getStatus(), PDO::PARAM_STR);
            $conexao->bindValue(10, $paciente->getNascimento(), PDO::PARAM_STR);
            $conexao->bindValue(11, $paciente->getId(), PDO::PARAM_INT);
            $conexao->execute();
            echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
            echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/paciente/list">';
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar atualizar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

}