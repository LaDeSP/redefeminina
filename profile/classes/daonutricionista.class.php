<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoNutricionista {

    private static $instance;

    private function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoNutricionista();
        }

        return self::$instance;
    }
    public function obterArquivo($id){
        $sql = "SELECT * FROM paciente_nutricionista WHERE id_paciente = '$id'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function atualizaArquivo($id, $texto){
        try{
            $sql = "UPDATE paciente_nutricionista set arquivo = ? WHERE id_paciente = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $texto, PDO::PARAM_STR);
            $conexao->bindValue(2, $id, PDO::PARAM_STR);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/list">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao atualizar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function inserir (PacienteNutricionista $paciente) {
        $id = $paciente->getId();
        $sqlReturn = "SELECT * FROM paciente_nutricionista WHERE id_paciente = '$id'";
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
                $sql = "UPDATE paciente_nutricionista set tem_alergia_alimentar = ?, tipo_alergia_alimentar = ?, tem_intolerancia_alimentar = ?,
                tipo_intolerancia_alimentar = ? WHERE id_paciente = ?";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $paciente->getTemAlergiaAlimentar(), PDO::PARAM_INT);
                $conexao->bindValue(2, $paciente->getTipoAlergiaAlimentar(), PDO::PARAM_STR);
                $conexao->bindValue(3, $paciente->getTemIntoleranciaAlimentar(), PDO::PARAM_INT);
                $conexao->bindValue(4, $paciente->getTipoIntoleranciaAlimentar(), PDO::PARAM_STR);
                $conexao->bindValue(5, $paciente->getId(), PDO::PARAM_INT);
                $conexao->execute();
                if ($conexao->rowCount() == 1) {
                    echo '<div class="alert alert-success"> Atualizado com sucesso </div>';
                    echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/list">';
                } else {
                    echo '<div class="alert alert-warning"> Erro ao atualizar </div>';
                }
            }catch (PDOException $erro) {
                echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
            }
        }else {
            try{
                $sql = "INSERT INTO paciente_nutricionista() VALUES (null, ?, ?, ?, ?, ?, ?)";
                $conexao = Conexao::getInstance()->prepare($sql);
                $conexao->bindValue(1, $paciente->getId(), PDO::PARAM_INT);
                $conexao->bindValue(2, $paciente->getTemAlergiaAlimentar(), PDO::PARAM_INT);
                $conexao->bindValue(3, $paciente->getTipoAlergiaAlimentar(), PDO::PARAM_STR);
                $conexao->bindValue(4, $paciente->getTemIntoleranciaAlimentar(), PDO::PARAM_INT);
                $conexao->bindValue(5, $paciente->getTipoIntoleranciaAlimentar(), PDO::PARAM_STR);
                $conexao->bindValue(6, "", PDO::PARAM_STR);

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

    public function inserirConsulta(PacienteNutricionista $paciente, ConsultaNutricionista $consulta, AvaliacaoClinica $avaliacaoClinica,
    RegistroAlimentar $registro, AvaliacaoAntropometrica $avaliacaoAntropometrica, CaracteristicasDoAparelhoGastrointestinal $caracteristicasAparelho, $value, $id_nutricionista){
        try{
            $sql = "INSERT INTO consulta_nutricionista() VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $paciente->getId(), PDO::PARAM_INT);
            $conexao->bindValue(2, $consulta->getDataConsulta(), PDO::PARAM_STR);
            $conexao->bindValue(3, $consulta->getMotivoConsulta(), PDO::PARAM_STR);
            $conexao->bindValue(4, $consulta->getInformacoesEvolucao(), PDO::PARAM_STR);
            $conexao->bindValue(5, $avaliacaoClinica->getPatologia(), PDO::PARAM_STR);
            $conexao->bindValue(6, $avaliacaoClinica->getPatologiaAssociada(), PDO::PARAM_STR);
            $conexao->bindValue(7, $avaliacaoAntropometrica->getPesoHabitual(), PDO::PARAM_STR);
            $conexao->bindValue(8, $avaliacaoAntropometrica->getPesoAtual(),PDO::PARAM_STR );
            $conexao->bindValue(9, $avaliacaoAntropometrica->getPesoDesejavel(), PDO::PARAM_STR);
            $conexao->bindValue(10, $avaliacaoAntropometrica->getCc(), PDO::PARAM_STR);
            $conexao->bindValue(11, $avaliacaoAntropometrica->getAltura());
            $conexao->bindValue(12, $avaliacaoAntropometrica->getRealizaAtividadeFisica(), PDO::PARAM_INT);
            $conexao->bindValue(13, $avaliacaoAntropometrica->getTipoAtividadeFisica(), PDO::PARAM_STR);
            $conexao->bindValue(14, $caracteristicasAparelho->getDisfagia(), PDO::PARAM_INT);
            $conexao->bindValue(15, $caracteristicasAparelho->getPirose(), PDO::PARAM_INT);
            $conexao->bindValue(16, $caracteristicasAparelho->getOdinofagia(), PDO::PARAM_INT);
            $conexao->bindValue(17, $caracteristicasAparelho->getAspectoFezes(), PDO::PARAM_STR);
            $conexao->bindValue(18, $caracteristicasAparelho->getModificacoesFezes(), PDO::PARAM_STR);
            $conexao->bindValue(19, $registro->getApetiteAtual(), PDO::PARAM_STR);
            $conexao->bindValue(20, $registro->getDesjejumRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(21, $registro->getDesjejumQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(22, $registro->getDejejumHora(), PDO::PARAM_STR);
            $conexao->bindValue(23, $registro->getColacaoRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(24, $registro->getColacaoQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(25, $registro->getColacaoHora(), PDO::PARAM_STR);
            $conexao->bindValue(26, $registro->getAlmocoRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(27, $registro->getAlmocoQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(28, $registro->getAlmocoHora(), PDO::PARAM_STR);
            $conexao->bindValue(29, $registro->getLancheRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(30, $registro->getLancheQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(31, $registro->getLancheHora(), PDO::PARAM_STR);
            $conexao->bindValue(32, $registro->getJantarRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(33, $registro->getJantarQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(34, $registro->getJantarHora(), PDO::PARAM_STR);
            $conexao->bindValue(35, $registro->getCeiaRefeicao(), PDO::PARAM_STR);
            $conexao->bindValue(36, $registro->getCeiaQuantidade(), PDO::PARAM_STR);
            $conexao->bindValue(37, $registro->getCeiaHora(), PDO::PARAM_STR);
            $conexao->bindValue(38, $id_nutricionista, PDO::PARAM_INT);


            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Inserido com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/consult/'.$value.'">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao inserir </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar inserir no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function listarPacienteNutricionistaID ($id) {
        $sql = "SELECT * FROM paciente_nutricionista WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function verificaPreenchimento ($id) {
        $sqlReturn = "SELECT * FROM paciente_nutricionista WHERE id_paciente = '$id'";
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
            $sql = "DELETE FROM paciente_nutricionista WHERE id_paciente = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/list">';
            } else {
                echo '<div class="alert alert-warning"> Não há nada para ser deletado </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

    public function deletarConsulta ($id) {
        try{
            $sql = "DELETE FROM consulta_nutricionista WHERE id_consulta_nutri = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/list/">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }

    public function listarConsultas ($id) {
        $sql = "SELECT * FROM consulta_nutricionista WHERE id_paciente_nutri = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarConsultasID ($id) {
        $sql = "SELECT * FROM consulta_nutricionista WHERE id_consulta_nutri = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function countConsultas ($id) {
        $sql =  "SELECT * FROM consulta_nutricionista WHERE id_paciente_nutri = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->rowCount($conexao);
    }

    public function deletarConsultas($id){
        try{
            $sql = "DELETE FROM consulta_nutricionista WHERE id_paciente_nutri = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() >= 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="0;URL='. PATH . '/nutricionista/list/">';
            } else {
                echo '<div class="alert alert-warning"> Não existem consultas para serem deletadas! </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function todosAtendidos(){
        $sql = "SELECT * FROM paciente";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function retornos($id){
        $sql = "SELECT * FROM consulta_nutricionista WHERE '$id' = id_paciente_nutri";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->rowCount($conexao);
    }

    public function ultimaConsulta($id){
        $sql = "SELECT * FROM consulta_nutricionista WHERE '$id' = id_paciente_nutri ORDER BY str_to_date(data_consulta, '%d/%m/%Y') DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }
    
    
}