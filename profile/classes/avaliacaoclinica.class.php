<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class AvaliacaoClinica{
	private $patologia;
	private $patologiaAssociada;

	public function setPatologia($patologia){
		$this->patologia = $patologia;
	}

	public function getPatologia(){
		return $this->patologia;
	}

	public function setPatologiaAssociada($patologiaAssociada){
		$this->patologiaAssociada = $patologiaAssociada;
	}

	public function getPatologiaAssociada(){
		return $this->patologiaAssociada;
	}
}

?>