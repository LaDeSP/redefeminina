<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));
date_default_timezone_set('America/Campo_Grande');

class DaoFinanceiro{
    private static $instance;

    private function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoFinanceiro();
        }

        return self::$instance;
    }

    public function inserirFluxo(){
        try{
            $sql = "INSERT INTO fluxo_caixa(mes) VALUES (?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, date('d/m/Y'));
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Fluxo aberto com Sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao abrir fluxo </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar abrir o fluxo de caixa! Erro: ' . $erro->getMessage() . '</div>';
        }
    }


    public function inserirSaldo(FinanceiroSaldo $financeiro){
        try{
            $sql = "INSERT INTO fluxo_caixa(saldo_inicial) VALUES (?)";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $financeiro->getValorSaldo());
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Fluxo aberto com Sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao abrir fluxo </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar abrir o fluxo de caixa! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function validarFluxo() {
        $sql = "SELECT `data_final_fluxo` FROM `fluxo_caixa` order by id_fluxo_caixa desc limit 1";
        $conexao = Conexao::getInstance()->prepare($sql);
        $conexao->execute();
        $std = $conexao->fetch(PDO::FETCH_OBJ);
        if($conexao->rowCount()==1){

            if($std->data_final_fluxo == null || $std->data_final_fluxo =="") {
                return true;
            } else {
                return false;
            }
        }
    }

    public function finalizarFluxo(float $saldo_entrada, float $saldo_saida, int $id_fluxo_caixa){
        try{
            $sql = "UPDATE fluxo_caixa set saldo_entrada = ?, saldo_saida = ?, data_final_fluxo = ? WHERE id_fluxo_caixa = ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $saldo_entrada);
            $conexao->bindValue(2, $saldo_saida);
            $conexao->bindValue(3, date('d/m/Y'));
            $conexao->bindValue(4, $id_fluxo_caixa);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Fluxo finalizado com sucesso </div>';
            } else {
                echo '<div class="alert alert-warning"> Erro ao finalizar fluxo</div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar finalizar fluxo no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }
    }

    public function inserirEntrada (FinanceiroEntrada $financeiro) {

        try{
            $sql = "INSERT INTO caixa_entrada() VALUES (null, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($financeiro->getFluxoCaixa());
            $conexao->execute();
            $id=$conexao->fetch(PDO::FETCH_ASSOC);
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $financeiro->getNome());
            $conexao->bindValue(2, $financeiro->getValor());
            $conexao->bindValue(3, $financeiro->getdtaentrada());
            $conexao->bindValue(4, $id['id']);
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
    public function inserirSaida (FinanceiroSaida $financeiro) {
        try{
            $sql = "INSERT INTO caixa_saida() VALUES (null, ?, ?, ?, ?)";
            $conexao = Conexao::getInstance()->prepare($financeiro->getFluxoCaixa());
            $conexao->execute();
            $id = $conexao->fetch(PDO::FETCH_ASSOC);
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $financeiro->getNome());
            $conexao->bindValue(2, $financeiro->getValor());
            $conexao->bindValue(3, $financeiro->getDtasaida());
            $conexao->bindValue(4, $id['id']);
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
    public function pega_id_fluxo () {
        $sql = "SELECT `id_fluxo_caixa`  FROM `fluxo_caixa` order by id_fluxo_caixa desc limit 1";
        $conexao = Conexao::getInstance()->query($sql);
        $std =  $conexao->fetch(PDO::FETCH_OBJ);
        return $std->id_fluxo_caixa;
    }

    public function listarEntrada (int $id) {
        $sql = "SELECT * FROM caixa_entrada WHERE id_fluxo = $id";
        $conexao = Conexao::getInstance()->prepare($sql);
        $conexao->execute();
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarSaida (int $id) {
        $sql = "SELECT * FROM caixa_saida WHERE id_fluxo_caixa= $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function listarPorIDEntrada (int $id) {
        $sql = "SELECT * FROM caixa_entrada WHERE id_caixa = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }
    public function listarPorIDSaida (int $id) {
        $sql = "SELECT * FROM caixa_saida WHERE id_conta = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function listarTodos () {
        $sql = "SELECT * FROM fluxo_caixa";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function deletarEntrada (int $id) {
        try{
            $sql = "DELETE FROM caixa_entrada WHERE id_caixa= ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/financeiro/list">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }
    public function deletarSaida (int $id) {
        try{
            $sql = "DELETE FROM caixa_saida WHERE id_conta= ?";
            $conexao = Conexao::getInstance()->prepare($sql);
            $conexao->bindValue(1, $id, PDO::PARAM_INT);
            $conexao->execute();
            if ($conexao->rowCount() == 1) {
                echo '<div class="alert alert-success"> Deletado com sucesso </div>';
                echo '<meta http-equiv="refresh" content="1;URL='. PATH . '/financeiro/list">';
            } else {
                echo '<div class="alert alert-warning"> Erro ao deletar </div>';
            }
        }catch (PDOException $erro) {
            echo '<div class="alert alert-danger"> Ocorreu um erro ao tentar deletar no banco de dados! Erro: ' . $erro->getMessage() . '</div>';
        }

    }
}