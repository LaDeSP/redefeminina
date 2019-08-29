<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class PacienteAssistenteSocial extends Paciente{
	private $tipoDoenca;
	private $recebeAuxilioDoenca;
	private $tipoAuxilioDoenca;
	private $necessitaCestaBasica;
	private $porQueCestaBasica;
	private $necessitaOutroAuxilio;
	private $tipoOutroAuxilio;
	private $qtdPessoasResidencia;
	private $qtdMenorDeIdade;
	private $qtdTrabalhadores;
	private $rendaFamilia;
	private $usaMedicamento;
	private $tipoMedicamento;
	private $realizaOutroTratamento;
	private $tipoTratamento;

	public function setTipoDoenca($tipoDoenca){
		$this->tipoDoenca = $tipoDoenca;
	}

	public function getTipoDoenca(){
		return $this->tipoDoenca;
	}

	public function setTipoAuxilioDoenca($tipoAuxilioDoenca){
		$this->tipoAuxilioDoenca = $tipoAuxilioDoenca;
	}

	public function getTipoAuxilioDoenca(){
		return $this->tipoAuxilioDoenca;
	}

	public function setRecebeAuxilioDoenca($recebeAuxilioDoenca){
		$this->recebeAuxilioDoenca = $recebeAuxilioDoenca;
	}

	public function getRecebeAuxilioDoenca(){
		return $this->recebeAuxilioDoenca;
	}

	public function setNecessitaCestaBasica($necessitaCestaBasica){
		$this->necessitaCestaBasica = $necessitaCestaBasica;
	}

	public function getNecessitaCestaBasica(){
		return $this->necessitaCestaBasica;
	}

	public function setPorQueCestaBasica($porQueCestaBasica){
		$this->porQueCestaBasica = $porQueCestaBasica;
	}

	public function getPorQueCestaBasica(){
		return $this->porQueCestaBasica;
	}

	public function setNecessitaOutroAuxilio($necessitaOutroAuxilio){
		$this->necessitaOutroAuxilio = $necessitaOutroAuxilio;
	}

	public function getNecessitaOutroAuxilio(){
		return $this->necessitaOutroAuxilio;
	}

	public function setTipoOutroAuxilio($tipoOutroAuxilio){
		$this->tipoOutroAuxilio = $tipoOutroAuxilio;
	}

	public function getTipoOutroAuxilio(){
		return $this->tipoOutroAuxilio;
	}

	public function setQtdPessoasResidencia($qtdPessoasResidencia){
		$this->qtdPessoasResidencia = $qtdPessoasResidencia;
	}

	public function getQtdPessoasResidencia(){
		return $this->qtdPessoasResidencia;
	}

	public function setQtdMenorDeIdade($qtdMenorDeIdade){
		$this->qtdMenorDeIdade = $qtdMenorDeIdade;
	}

	public function getQtdMenorDeIdade(){
		return $this->qtdMenorDeIdade;
	}

	public function setQtdTrabalhadores($qtdTrabalhadores){
		$this->qtdTrabalhadores = $qtdTrabalhadores;
	}

	public function getQtdTrabalhadores(){
		return $this->qtdTrabalhadores;
	}

	public function setRendaFamilia($rendaFamilia){
		$this->rendaFamilia = $rendaFamilia;
	}

	public function getRendaFamilia(){
		return $this->rendaFamilia;
	}


	public function setUsaMedicamento($usaMedicamento){
		$this->usaMedicamento = $usaMedicamento;
	}

	public function getUsaMedicamento(){
		return $this->usaMedicamento;
	}

	public function setTipoMedicamento($tipoMedicamento){
		$this->tipoMedicamento = $tipoMedicamento;
	}

	public function getTipoMedicamento(){
		return $this->tipoMedicamento;
	}

	public function setRealizaOutroTratamento($realizaOutroTratamento){
		$this->realizaOutroTratamento = $realizaOutroTratamento;
	}

	public function getRealizaOutroTratamento(){
		return $this->realizaOutroTratamento;
	}

	public function setTipoTratamento($tipoTratamento){
		$this->tipoTratamento = $tipoTratamento;
	}

	public function getTipoTratamento(){
		return $this->tipoTratamento;
	}

}

?>