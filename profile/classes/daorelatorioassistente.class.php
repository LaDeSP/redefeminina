<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoRelatorioAssistente {

    private static $instance;

    public function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoRelatorioAssistente();
        }

        return self::$instance;
    }

    public function pacientesAtivos () {
        $sql = "SELECT * FROM paciente WHERE status = 'Ativo' ORDER BY nome_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesInativos () {
        $sql = "SELECT * FROM paciente WHERE status = 'Inativo' ORDER BY nome_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesRecebemAuxilioDoenca () {
        $sql = "SELECT * FROM paciente_assistente WHERE recebe_auxilio_doenca = 1 ORDER BY id_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNecessitamCesta () {
        $sql = "SELECT * FROM paciente_assistente WHERE necessita_cesta = 1 ORDER BY id_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesUsaMedicamento () {
    $sql = "SELECT * FROM paciente_assistente WHERE usa_medicamento = 1 ORDER BY id_paciente ASC";
    $conexao = Conexao::getInstance()->query($sql);
    return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesRealizaOutroTratamento () {
        $sql = "SELECT * FROM paciente_assistente WHERE realiza_outro_tratamento = 1 ORDER BY id_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNecessitaOutroAuxilio () {
        $sql = "SELECT * FROM paciente_assistente WHERE necessita_outro_auxilio = 1 ORDER BY id_paciente ASC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function getName($id){
        $sql = "SELECT * FROM paciente WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }
}