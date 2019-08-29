<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class RegistroAlimentar{
	private $desjejum;
	private $colacao;
	private $almoco;
	private $lanche;
	private $jantar;
	private $ceia;
	private $apetiteAtual;

    public function __construct(){
        $this->desjejum = new TipoAlimentacao();
        $this->colacao = new TipoAlimentacao();
        $this->almoco = new TipoAlimentacao();
        $this->lanche = new TipoAlimentacao();
        $this->jantar = new TipoAlimentacao();
        $this->ceia = new TipoAlimentacao();

    }

	//#######################################################################

	public function setDesjejum($refeicao, $quantidade, $hora){
		$this->desjejum->setRefeicao($refeicao);
		$this->desjejum->setQuantidade($quantidade);
		$this->desjejum->setHora($hora);
	}

	public function getDesjejumRefeicao(){
		return $this->desjejum->getRefeicao();
	}

	public function getDesjejumQuantidade(){
		return $this->desjejum->getQuantidade();
	}

	public function getDejejumHora(){
		return $this->desjejum->getHora() ;
	}

	//#######################################################################

	public function setColacao($refeicao, $quantidade, $hora){
		$this->colacao->setRefeicao($refeicao);
		$this->colacao->setQuantidade($quantidade);
		$this->colacao->setHora($hora);
	}

	public function getColacaoRefeicao(){
		return $this->colacao->getRefeicao();
	}

	public function getColacaoQuantidade(){
		return $this->colacao->getQuantidade() ;
	}

	public function getColacaoHora(){
		return $this->colacao->getHora() ;
	}

	//#######################################################################

	public function setAlmoco($refeicao, $quantidade, $hora){
		$this->almoco->setRefeicao($refeicao);
		$this->almoco->setQuantidade($quantidade);
		$this->almoco->setHora($hora);
	}

	public function getAlmocoRefeicao(){
		return $this->almoco->getRefeicao();
	}

	public function getAlmocoQuantidade(){
		return $this->almoco->getQuantidade();
	}

	public function getAlmocoHora(){
		return $this->almoco->getHora();
	}

	//#######################################################################

	public function setLanche($refeicao, $quantidade, $hora){
		$this->lanche->setRefeicao($refeicao);
		$this->lanche->setQuantidade($quantidade);
		$this->lanche->setHora($hora);
	}

	public function getLancheRefeicao(){
		return $this->lanche->getRefeicao();
	}

	public function getLancheQuantidade(){
		return $this->lanche->getQuantidade();
	}

	public function getLancheHora(){
		return $this->lanche->getHora();
	}

	//#######################################################################

	public function setJantar($refeicao, $quantidade, $hora){
		$this->jantar->setRefeicao($refeicao);
		$this->jantar->setQuantidade($quantidade);
		$this->jantar->setHora($hora);
	}

	public function getJantarRefeicao(){
		return $this->jantar->getRefeicao();
	}

	public function getJantarQuantidade(){
		return $this->jantar->getQuantidade();
	}

	public function getJantarHora(){
		return $this->jantar->getHora();
	}

	//#######################################################################

	public function setCeia($refeicao, $quantidade, $hora){
		$this->ceia->setRefeicao($refeicao);
		$this->ceia->setQuantidade($quantidade);
		$this->ceia->setHora($hora);
	}

	public function getCeiaRefeicao(){
		return $this->ceia->getRefeicao();
	}

	public function getCeiaQuantidade(){
		return $this->ceia->getQuantidade();
	}

	public function getCeiaHora(){
		return $this->ceia->getHora();
	}

	//#######################################################################

	public function setApetiteAtual($apetiteAtual){
		$this->apetiteAtual = $apetiteAtual;
	}

	//#######################################################################

	public function getApetiteAtual(){
		return $this->	apetiteAtual;
	}

}

?>