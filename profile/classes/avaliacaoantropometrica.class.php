<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class AvaliacaoAntropometrica{
	private $pesoHabitual;
	private $pesoAtual;
	private $altura;
	private $pesoDesejavel;
	private $cc;
	private $imc;
	private $realizaAtividadeFisica;
	private $tipoAtividadeFisica;

	public function setPesoHabitual($pesoHabitual){
		$this->pesoHabitual = $pesoHabitual;
	}

	public function getPesoHabitual(){
		return $this->pesoHabitual;
	}

	public function setAltura($altura){
		$this->altura = $altura;
	}

	public function getAltura(){
		return $this->altura;
	}

	public function setPesoAtual($pesoAtual){
		$this->pesoAtual = $pesoAtual;
	}

	public function getPesoAtual(){
		return $this->pesoAtual;
	}
	
	public function setPesoDesejavel($pesoDesejavel){
		$this->pesoDesejavel = $pesoDesejavel;
	}

	public function getPesoDesejavel(){
		return $this->pesoDesejavel;
	}
	
	public function setCc($cc){
		$this->cc = $cc;
	}

	public function getCc(){
		return $this->cc;
	}
	
	public function setImc($imc){
		$this->imc = $imc;
	}

	public function getImc(){
		return $this->imc;
	}
	
	public function setRealizaAtividadeFisica($realizaAtividadeFisica){
		$this->realizaAtividadeFisica = $realizaAtividadeFisica;
	}

	public function getRealizaAtividadeFisica(){
		return $this->realizaAtividadeFisica;
	}
	
	public function setTipoAtividadeFisica($tipoAtividadeFisica){
		$this->tipoAtividadeFisica = $tipoAtividadeFisica;
	}

	public function getTipoAtividadeFisica(){
		return $this->tipoAtividadeFisica;
	}
	
}
?>