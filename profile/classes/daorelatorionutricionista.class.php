<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class DaoRelatorioNutricionista {

    private static $instance;

    public function __construct() { }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DaoRelatorioNutricionista();
        }

        return self::$instance;
    }

    public function pacientesAtividadeFisica() {
        $sql = "SELECT * FROM consulta_nutricionista WHERE realiza_atividade_fisica = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesTemAlergia() {
        $sql = "SELECT * FROM paciente_nutricionista WHERE tem_alergia_alimentar = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoTemAlergia() {
        $sql = "SELECT * FROM paciente_nutricionista WHERE tem_alergia_alimentar = '0'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesTemIntolerancia() {
        $sql = "SELECT * FROM paciente_nutricionista WHERE tem_intolerancia_alimentar = '1'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function pacientesNaoTemIntolerancia() {
        $sql = "SELECT * FROM paciente_nutricionista WHERE tem_intolerancia_alimentar = '0'";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }


    public function getName($id){
        $sql = "SELECT * FROM paciente WHERE id_paciente = $id";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetch(PDO::FETCH_OBJ);
    }

    public function pacientesAtendidoPor(){
        $id = $_SESSION['id_user'];
        $sql = "SELECT * FROM consulta_nutricionista WHERE id_nutricionista = '$id' ORDER BY str_to_date(data_consulta, '%d/%m/%Y') DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }

    public function todosAtendidos(){
        $sql = "SELECT * FROM consulta_nutricionista ORDER BY str_to_date(data_consulta, '%d/%m/%Y') DESC";
        $conexao = Conexao::getInstance()->query($sql);
        return $conexao->fetchAll(PDO::FETCH_OBJ);
    }
}