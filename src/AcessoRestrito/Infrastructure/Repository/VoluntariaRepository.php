<?php

namespace App\AcessoRestrito\Domain\Repository;

use App\AcessoRestrito\Domain\Entity\Voluntaria;
use \RedBeanPHP\R;

class VoluntariaRepository{
	
	public function salvar(Voluntaria $v){

		private $voluntaria = R::dispense("voluntaria");
		$this->voluntaria->id = $v->id;
		$this->voluntaria->nome = $v->nome;
		$this->voluntaria->rua = $v->rua;
		$this->voluntaria->numero = $v->numero;
		$this->voluntaria->dataNascimento = $v->dataNascimento;
		$this->voluntaria->telefone = $v->telefone;
		$this->voluntaria->celular = $v->celular;
		$this->voluntaria->sexo = $v->sexo;
		$this->voluntaria->cpf = $v->cpf;
		$this->voluntaria->rg = $v->rg;
		$this->voluntaria->profissao = $v->profissao;
		$this->voluntaria->habilidades = $v->habilidades;
		$this->voluntaria->diaSemanaDisponivel = $v->diaSemanaDisponivel;
		$this->voluntaria->horaSemanaDisponivel = $v->horaSemanaDisponivel;
		$this->voluntaria->nomeUsuario = $v->nomeUsuario;
		$this->voluntaria->senha = $v->senha;
		$this->voluntaria->estatus = $v->estatus;
		$this->voluntaria->nivelAcesso = $v->nivelAcesso;
		
		return R::store($this->voluntaria);
	}
	public function atualizar(Voluntaria $v){
		
		$voluntaria = R::loadForUpdate( 'book', $v->id ); 
		$this->voluntaria->id = $v->id;
		$this->voluntaria->nome = $v->nome;
		$this->voluntaria->rua = $v->rua;
		$this->voluntaria->numero = $v->numero;
		$this->voluntaria->dataNascimento = $v->dataNascimento;
		$this->voluntaria->telefone = $v->telefone;
		$this->voluntaria->celular = $v->celular;
		$this->voluntaria->sexo = $v->sexo;
		$this->voluntaria->cpf = $v->cpf;
		$this->voluntaria->rg = $v->rg;
		$this->voluntaria->profissao = $v->profissao;
		$this->voluntaria->habilidades = $v->habilidades;
		$this->voluntaria->diaSemanaDisponivel = $v->diaSemanaDisponivel;
		$this->voluntaria->horaSemanaDisponivel = $v->horaSemanaDisponivel;
		$this->voluntaria->nomeUsuario = $v->nomeUsuario;
		$this->voluntaria->senha = $v->senha;
		$this->voluntaria->estatus = $v->estatus;
		$this->voluntaria->nivelAcesso = $v->nivelAcesso;
		
		return R::store($this->voluntaria);
	}
	public function deletarPorId(int $id){
		$voluntaria = R::load( 'book', $id );
		R::trash( $voluntaria ); 
	}
	public function buscarPorId(int $id){
		return R::load( 'book', $id );
	}
	public function buscarTodos(){
		return R::load('book'); //deve retornar todos
	}
	
}


?>
