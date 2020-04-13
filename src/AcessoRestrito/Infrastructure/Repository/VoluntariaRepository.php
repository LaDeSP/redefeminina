<?php

namespace App\AcessoRestrito\Infrastructure\Repository;

use App\AcessoRestrito\Domain\Entity\Voluntaria;
use RedBeanPHP\R;
use App\Services\ObjectMapperService;
use App\AcessoRestrito\Domain\Repository\IVoluntariaRepository;

class VoluntariaRepository implements IVoluntariaRepository{

	public function salvar(Voluntaria $voluntaria){
		//I think this one needs to be static to work
		$voluntaria_row = R::dispense("voluntaria");
		$voluntaria->id = $voluntaria_row->id;
		$voluntaria = ObjectMapperService::map($voluntaria_row, $voluntaria);
		return R::store($voluntaria_row);
	}
	public function atualizar(Voluntaria $v){

		$voluntaria = R::loadForUpdate( 'book', $v->id );

		$voluntaria = ObjectMapperService($voluntaria, $v);
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
