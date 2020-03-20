<?php

namespace App\AcessoRestrito\Domain\Repository;

use App\AcessoRestrito\Domain\Entity\Voluntaria;

interface IVoluntariaRepository{
	
	public function salvar(Voluntaria $voluntaria);
	public function atualizar(Voluntaria $voluntaria);
	public function deletarPorId(int $id);
	public function buscarPorId(int $id);
	public function buscarTodos();
	
}


?>
