<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoFisioterapeuta {

    private static $instance;

    private function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoFisioterapeuta();
        }

        return self::$instance;
    }
    public function editarPerfil(PerfilFisioterapeuta $perfil){
        try{
            $sql = "INSERT INTO paciente_fisioterapeuta() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $perfil->getId(), PDO::PARAM_INT);
            $conexao->bindValue(2, $perfil->getTipoCirurgia(), PDO::PARAM_STR);
            $conexao->bindValue(3, $perfil->getDataCirurgia(), PDO::PARAM_STR);
            $conexao->bindValue(4, $perfil->getHospitalRealizado(), PDO::PARAM_STR);
            $conexao->bindValue(5, $perfil->getHemitoraxCirurgiado(), PDO::PARAM_STR);
            $conexao->bindValue(6, $perfil->getTransOperatorio(), PDO::PARAM_STR);
            $conexao->bindValue(7, $perfil->getPosOperatorioImediato(), PDO::PARAM_STR);
            $conexao->bindValue(8, $perfil->getPosOperatorioTardio(), PDO::PARAM_STR);
            $conexao->bindValue(9, $perfil->getOutrasCirurgias(), PDO::PARAM_STR);
            $conexao->bindValue(10, $perfil->getRealizouFisioterapia(), PDO::PARAM_STR);
            $conexao->bindValue(11, $perfil->getCasosCancer(), PDO::PARAM_INT);
            $conexao->bindValue(12, $perfil->getParentescoCasosCancer(), PDO::PARAM_STR);
            $conexao->bindValue(13, $perfil->getOutrosCasos(), PDO::PARAM_INT);
            $conexao->bindValue(14, $perfil->getLocal(), PDO::PARAM_STR);
            $conexao->bindValue(15, $perfil->getParentescoOutrosCasos(), PDO::PARAM_STR);
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

    public function inserirConsulta(ConsultaFisioterapeuta $paciente){
        try{
            $sql = "INSERT INTO consulta_fisioterapeuta() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $paciente->getId(), PDO::PARAM_INT);
            $conexao->bindValue(2, $paciente->getDataConsulta(), PDO::PARAM_STR);
            $conexao->bindValue(3, $paciente->getMotivoConsulta(), PDO::PARAM_STR);
            $conexao->bindValue(4, $paciente->getQueixaPrincipal(), PDO::PARAM_STR);
            $conexao->bindValue(5, $paciente->getHistoriaDoenca(), PDO::PARAM_STR);

            $conexao->bindValue(6, $paciente->getRadioterapiaInicio(), PDO::PARAM_STR);
            $conexao->bindValue(7, $paciente->getRadioterapiaFinal(), PDO::PARAM_STR);
            $conexao->bindValue(8, $paciente->getRadioterapiaSessoes(), PDO::PARAM_STR);
            $conexao->bindValue(9, $paciente->getQuimioterapiaInicio(), PDO::PARAM_STR);
            $conexao->bindValue(10, $paciente->getQuimioterapiaFinal(), PDO::PARAM_STR);
            $conexao->bindValue(11, $paciente->getQuimioterapiaSessoes(), PDO::PARAM_STR);
            $conexao->bindValue(12, $paciente->getHormonioterapiaInicio(), PDO::PARAM_STR);
            $conexao->bindValue(13, $paciente->getHormonioterapiaFinal(), PDO::PARAM_STR);
            $conexao->bindValue(14, $paciente->getHormonioterapiaSessoes(), PDO::PARAM_STR);
            $conexao->bindValue(15, $paciente->getObservacao(), PDO::PARAM_STR);

            $conexao->bindValue(16, $paciente->getCabeca(), PDO::PARAM_STR);
            $conexao->bindValue(17, $paciente->getOmbros(), PDO::PARAM_STR);
            $conexao->bindValue(18, $paciente->getDorso(), PDO::PARAM_STR);
            $conexao->bindValue(19, $paciente->getLombar(), PDO::PARAM_STR);
            $conexao->bindValue(20, $paciente->getPerve(), PDO::PARAM_STR);
            $conexao->bindValue(21, $paciente->getJoelhos(), PDO::PARAM_STR);
            $conexao->bindValue(22, $paciente->getPes(), PDO::PARAM_STR);
            $conexao->bindValue(23, $paciente->getConclusao(), PDO::PARAM_STR);
            $conexao->bindValue(24, $paciente->getTipoMarcha(), PDO::PARAM_STR);
            $conexao->bindValue(25, $paciente->getDor(), PDO::PARAM_INT);
            $conexao->bindValue(26, $paciente->getLocalDor(), PDO::PARAM_STR);
            $conexao->bindValue(27, $paciente->getAderencias(), PDO::PARAM_INT);
            $conexao->bindValue(28, $paciente->getLocalAderencias(),PDO::PARAM_STR);
            $conexao->bindValue(29, $paciente->getOutros(),PDO::PARAM_STR);
            $conexao->bindValue(30, $paciente->getSensibilidade(),PDO::PARAM_INT);
            $conexao->bindValue(31, $paciente->getLocalizacao(),PDO::PARAM_STR);
            $conexao->bindValue(32, $paciente->getProfunda(),PDO::PARAM_STR);
            $conexao->bindValue(33, $paciente->getLinfedemaQuando(),PDO::PARAM_STR);
            $conexao->bindValue(34, $paciente->getLinfedemaCaracteristicas(),PDO::PARAM_STR);
            $conexao->bindValue(35, $paciente->getLinfedemaLocalizacao(),PDO::PARAM_STR);
            $conexao->bindValue(36, $paciente->getHabitosSentar(),PDO::PARAM_STR);
            $conexao->bindValue(37, $paciente->getHabitosDeitarLevantar(),PDO::PARAM_STR);
            $conexao->bindValue(38, $paciente->getHabitosDormir(),PDO::PARAM_STR);
            $conexao->bindValue(39, $paciente->getParecerFisioterapico(),PDO::PARAM_STR);
            $conexao->bindValue(40, $paciente->getConduta(),PDO::PARAM_STR);
            $conexao->bindValue(41, $paciente->getDataOrientacao(),PDO::PARAM_STR);
            $conexao->bindValue(42, $paciente->getOrientacao(),PDO::PARAM_STR);
            $conexao->bindValue(43, $paciente->getEvolucao(),PDO::PARAM_STR);

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

    public function listarPacienteFisioID ($id) {
        $sql = "SELECT * FROM paciente_fisioterapeuta WHERE id_paciente = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function verificaPreenchimento ($id) {
        $sqlReturn = "SELECT * FROM paciente_fisioterapeuta WHERE id_paciente = '$id'";
        $conexaoT = Conexao::getInstance()->prepare($sqlReturn);
        $conexaoT->execute();
        $count = 0;
        $tables = $conexaoT->fetchAll();

        foreach ($tables as $table) {
            echo $table->id_paciente_fisio;
            $count++;
        }
        return $count;
    }

    public function deletarConsulta ($id) {
        try{
            $sql = "DELETE FROM consulta_fisioterapeuta WHERE id = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/fisioterapeuta/list">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

    public function listarConsultas ($id) {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE id_paciente_fisio = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarConsultasID ($id) {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE id = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function deletarConsultas ($id) {
        try{
            $sql = "DELETE FROM consulta_fisioterapeuta WHERE id_paciente_fisio = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() >= 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/fisioterapeuta/list">';
            } else {
                echo '<div class="alert alert-warning"> Não existem consultas para serem deletadas!  </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

}