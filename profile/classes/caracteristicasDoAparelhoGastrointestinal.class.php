<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class CaracteristicasDoAparelhoGastrointestinal{
	private $disfagia;
	private $pirose;
	private $odinofagia;
	private $aspectoFezes;
	private $modificacoesFezes;

	public function setDisfagia($disfagia){
		$this->disfagia = $disfagia;
	}

	public function getDisfagia(){
		return $this->disfagia;
	}

	public function setPirose($pirose){
		$this->pirose = $pirose;
	}

	public function getPirose(){
		return $this->pirose;
	}

	public function setOdinofagia($odinofagia){
		$this->odinofagia = $odinofagia;
	}

	public function getOdinofagia(){
		return $this->odinofagia;
	}
	
	public function setAspectoFezes($aspectoFezes){
		$this->aspectoFezes = $aspectoFezes;
	}

	public function getAspectoFezes(){
		return $this->aspectoFezes;
	}

	public function setModificacoesFezes($modificacoesFezes){
		$this->modificacoesFezes = $modificacoesFezes;
	}

	public function getModificacoesFezes(){
		return $this->modificacoesFezes;
	}

}

?>