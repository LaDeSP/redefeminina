<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class PacienteNutricionista extends Paciente{
	private $temAlergiaAlimentar;
	private $tipoAlergiaAlimentar;
	private $temIntoleranciaAlimentar;
	private $tipoIntoleranciaAlimentar;

	public function setConsulta($consultaNutricionista){
		array_push($this->consulta, $consultaNutricionista);
	}

	public function getConsulta($consultaNutricionista){
		
	}

	public function setTemAlergiaAlimentar($temAlergiaAlimentar){
		$this->temAlergiaAlimentar = $temAlergiaAlimentar;
	}

	public function getTemAlergiaAlimentar(){
		return $this->temAlergiaAlimentar;
	}

	public function setTipoAlergiaAlimentar($tipoAlergiaAlimentar){
		$this->tipoAlergiaAlimentar = $tipoAlergiaAlimentar;
	}

	public function getTipoAlergiaAlimentar(){
		return $this->tipoAlergiaAlimentar;
	}

	public function setTemIntoleranciaAlimentar($temIntoleranciaAlimentar){
		$this->temIntoleranciaAlimentar = $temIntoleranciaAlimentar;
	}

	public function getTemIntoleranciaAlimentar(){
		return $this->temIntoleranciaAlimentar;
	}

	public function setTipoIntoleranciaAlimentar($tipoIntoleranciaAlimentar){
		$this->tipoIntoleranciaAlimentar = $tipoIntoleranciaAlimentar;
	}

	public function getTipoIntoleranciaAlimentar(){
		return $this->tipoIntoleranciaAlimentar;
	}


}

?>