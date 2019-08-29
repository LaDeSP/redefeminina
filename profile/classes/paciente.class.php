<?php

include_once 'autoload.php';
protegeArquivo(basename(__FILE__));

class Paciente{
	private $id;
	private $nome;
	private $rua;
	private $numeroCasa;
    private $nascimento;
	private $telefone;
	private $celular;
	private $cpf;
	private $rg;
	private $sexo;
	private $status;

    public function setNascimento($nascimento){
        $this->nascimento = $nascimento;
    }

    public function getNascimento(){
        return $this->nascimento;
    }

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setRua($rua){
		$this->rua = $rua;
	}

	public function getRua(){
		return $this->rua;
	}

	public function setNumeroCasa($numeroCasa){
		$this->numeroCasa = $numeroCasa;
	}

	public function getNumeroCasa(){
		return $this->numeroCasa;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setRg($rg){
		$this->rg = $rg;
	}

	public function getRg(){
		return $this->rg;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getSexo(){
		return $this->sexo;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

}
?>