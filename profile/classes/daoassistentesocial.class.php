<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoAssistenteSocial {

    private static $instance;

    private function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoAssistenteSocial();
        }

        return self::$instance;
    }

    public function inserir (PacienteAssistenteSocial $paciente) {
        $id = $paciente->getId();
        $sqlReturn = "SELECT * FROM paciente_assistente WHERE id_paciente = '$id'";
        $conexaoT = Conexao::getInstance()->prepare($sqlReturn);
        $conexaoT->execute();
        $count = 0;
        $tables = $conexaoT->fetchAll();

        foreach ($tables as $table){
            echo $table->id_paciente;
            $count++;
        }
        if($count == 1){
            try{
                $sql = "UPDATE paciente_assistente set tipo_doenca = ?, recebe_auxilio_doenca = ?, tipo_auxilio = ?, necessita_cesta = ?,
                porque_necessita = ?, qtd_pessoas_res = ?, qtd_crianca = ?, qtd_trabalhadores = ?, renda_familiar = ?, usa_medicamento = ?,
                tipo_medicamento = ?, realiza_outro_tratamento = ?, tipo_tratamento = ?, necessita_outro_auxilio = ?,
                tipo_outro_auxilio = ? WHERE id_paciente = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $paciente->getTipoDoenca(), PDO::PARAM_STR);
                $conexao->bindValue(2, $paciente->getRecebeAuxilioDoenca(), PDO::PARAM_INT);
                $conexao->bindValue(3, $paciente->getTipoAuxilioDoenca(), PDO::PARAM_STR);
                $conexao->bindValue(4, $paciente->getNecessitaCestaBasica(), PDO::PARAM_INT);
                $conexao->bindValue(5, $paciente->getPorQueCestaBasica(), PDO::PARAM_STR);
                $conexao->bindValue(6, $paciente->getQtdPessoasResidencia(), PDO::PARAM_INT);
                $conexao->bindValue(7, $paciente->getQtdMenorDeIdade(), PDO::PARAM_INT);
                $conexao->bindValue(8, $paciente->getQtdTrabalhadores(), PDO::PARAM_INT);
                $conexao->bindValue(9, $paciente->getRendaFamilia(), PDO::PARAM_STR);
                $conexao->bindValue(10, $paciente->getUsaMedicamento(), PDO::PARAM_INT);
                $conexao->bindValue(11, $paciente->getTipoMedicamento(), PDO::PARAM_STR);
                $conexao->bindValue(12, $paciente->getRealizaOutroTratamento(), PDO::PARAM_INT);
                $conexao->bindValue(13, $paciente->getTipoTratamento(), PDO::PARAM_STR);
                $conexao->bindValue(14, $paciente->getNecessitaOutroAuxilio(), PDO::PARAM_INT);
                $conexao->bindValue(15, $paciente->getTipoOutroAuxilio(), PDO::PARAM_STR);
                $conexao->bindValue(16, $paciente->getId(), PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/assistente/list">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao atualizar </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }else {
            try{
                $sql = "INSERT INTO paciente_assistente() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $paciente->getId(), PDO::PARAM_INT);
                $conexao->bindValue(2, $paciente->getTipoDoenca(), PDO::PARAM_STR);
                $conexao->bindValue(3, $paciente->getRecebeAuxilioDoenca(), PDO::PARAM_INT);
                $conexao->bindValue(4, $paciente->getTipoAuxilioDoenca(), PDO::PARAM_STR);
                $conexao->bindValue(5, $paciente->getNecessitaCestaBasica(), PDO::PARAM_INT);
                $conexao->bindValue(6, $paciente->getPorQueCestaBasica(), PDO::PARAM_STR);
                $conexao->bindValue(7, $paciente->getQtdPessoasResidencia(), PDO::PARAM_INT);
                $conexao->bindValue(8, $paciente->getQtdMenorDeIdade(), PDO::PARAM_INT);
                $conexao->bindValue(9, $paciente->getQtdTrabalhadores(), PDO::PARAM_INT);
                $conexao->bindValue(10, $paciente->getRendaFamilia(), PDO::PARAM_STR);
                $conexao->bindValue(11, $paciente->getUsaMedicamento(), PDO::PARAM_INT);
                $conexao->bindValue(12, $paciente->getTipoMedicamento(), PDO::PARAM_STR);
                $conexao->bindValue(13, $paciente->getRealizaOutroTratamento(), PDO::PARAM_INT);
                $conexao->bindValue(14, $paciente->getTipoTratamento(), PDO::PARAM_STR);
                $conexao->bindValue(15, $paciente->getNecessitaOutroAuxilio(), PDO::PARAM_INT);
                $conexao->bindValue(16, $paciente->getTipoOutroAuxilio(), PDO::PARAM_STR);
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
    }

    public function listarPacienteAssistenteID ($id) {
        $sql = "SELECT * FROM paciente_assistente WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function verificaPreenchimento ($id) {
        $sqlReturn = "SELECT * FROM paciente_assistente WHERE id_paciente = '$id'";
        $conexaoT = Conexao::getInstance()->prepare($sqlReturn);
        $conexaoT->execute();
        $count = 0;
        $tables = $conexaoT->fetchAll();

        foreach ($tables as $table) {
            echo $table->id_paciente;
            $count++;
        }
        return $count;
    }

    public function deletar ($id) {
        try{
            $sql = "DELETE FROM paciente_assistente WHERE id_paciente = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/assistente/list">';
            } else {
                echo '<div class="alert alert-warning"> Não há nada para ser deletado </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

}