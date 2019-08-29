<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class ConsultaNutricionista extends PacienteNutricionista{
	private $dataConsulta;
	private $motivoConsulta;
	private $informacoesEvolucao;
	private $registroAlimentar;
	private $avaliacaoAntropometrica;
	private $caracteristicaAparelhoGastroIntestinal;

	/**
	 * @return mixed
	 */
	public function getDataConsulta()
	{
		return $this->dataConsulta;
	}

	/**
	 * @param mixed $dataConsulta
	 */
	public function setDataConsulta($dataConsulta)
	{
		$this->dataConsulta = $dataConsulta;
	}

	/**
	 * @return mixed
	 */
	public function getMotivoConsulta()
	{
		return $this->motivoConsulta;
	}

	/**
	 * @param mixed $motivoConsulta
	 */
	public function setMotivoConsulta($motivoConsulta)
	{
		$this->motivoConsulta = $motivoConsulta;
	}

	/**
	 * @return mixed
	 */
	public function getInformacoesEvolucao()
	{
		return $this->informacoesEvolucao;
	}

	/**
	 * @param mixed $informacoesEvolucao
	 */
	public function setInformacoesEvolucao($informacoesEvolucao)
	{
		$this->informacoesEvolucao = $informacoesEvolucao;
	}

	/**
	 * @return mixed
	 */
	public function getRegistroAlimentar()
	{
		return $this->registroAlimentar;
	}

	/**
	 * @param mixed $registroAlimentar
	 */
	public function setRegistroAlimentar($registroAlimentar)
	{
		$this->registroAlimentar = $registroAlimentar;
	}

	/**
	 * @return mixed
	 */
	public function getAvaliacaoAntropometrica()
	{
		return $this->avaliacaoAntropometrica;
	}

	/**
	 * @param mixed $avaliacaoAntropometrica
	 */
	public function setAvaliacaoAntropometrica($avaliacaoAntropometrica)
	{
		$this->avaliacaoAntropometrica = $avaliacaoAntropometrica;
	}

	/**
	 * @return mixed
	 */
	public function getCaracteristicaAparelhoGastroIntestinal()
	{
		return $this->caracteristicaAparelhoGastroIntestinal;
	}

	/**
	 * @param mixed $caracteristicaAparelhoGastroIntestinal
	 */
	public function setCaracteristicaAparelhoGastroIntestinal($caracteristicaAparelhoGastroIntestinal)
	{
		$this->caracteristicaAparelhoGastroIntestinal = $caracteristicaAparelhoGastroIntestinal;
	}




}



?>