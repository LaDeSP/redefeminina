<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoRelatorioFisioterapeuta {

    private static $instance;

    public function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoRelatorioFisioterapeuta();
        }

        return self::$instance;
    }

    public function pacientesCasosCancerMama() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE casos_cancer = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesOutroCasosCancer() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE outros_casos = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesDor() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE dor = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesAderencias() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE aderencias = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesSensibilidade() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE sensibilidade = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoCasosCancerMama() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE casos_cancer = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoOutroCasosCancer() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE outros_casos = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoDor() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE dor = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoAderencias() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE aderencias = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoSensibilidade() {
        $sql = "SELECT * FROM consulta_fisioterapeuta WHERE sensibilidade = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function getName($id){
        $sql = "SELECT * FROM paciente WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }
}