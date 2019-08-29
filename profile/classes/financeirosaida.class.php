<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class FinanceiroSaida{
    private $id;
    private $nome;
    private $valor;
    private $dtasaida;
    private $fluxo_caixa;

    public function __construct($nome,$valor,$dtasaida){
        $this->nome = $nome;
        $this->valor = $valor;
        $this->dtasaida = $dtasaida;
        $this->fluxo_caixa="SELECT `id_fluxo_caixa` as id FROM `fluxo_caixa` order by id desc limit 1";
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getFluxoCaixa()
    {
        return $this->fluxo_caixa;
    }

    public function setFluxoCaixa($fluxo_caixa)
    {
        $this->fluxo_caixa = $fluxo_caixa;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setDtasaida($dtasaida){
        $this->dtasaida = $dtasaida;
    }

    public function getDtasaida(){
        return $this->dtasaida;
    }
}
?>

