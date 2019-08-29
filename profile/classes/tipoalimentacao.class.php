<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class TipoAlimentacao{
	private $refeicao;
	private $quantidade;
	private $hora;

	public function __construct(){

	}

	public function setRefeicao($refeicao){
		$this->refeicao = $refeicao;
	}

	public function getRefeicao(){
		return $this->refeicao;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function setHora($hora){
		$this->hora = $hora;
	}

	public function getHora(){
		return $this->hora;
	}

}
?>