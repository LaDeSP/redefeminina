<?php

namespace App\AcessoRestrito\Domain\Service;

use App\AcessoRestrito\Domain\Entity\Voluntaria;

interface IVoluntariaService{

	public function criarVoluntaria(Voluntaria $voluntaria);
	public function atualizarVoluntaria(Voluntaria $voluntaria);
	public function deletarVoluntaria(int $id);
	public function listarVoluntarios(int $id);
	public function buscarVoluntariaPorId(int $id);
	public function buscarVoluntariaPorNomeUsuario(string $nome);

}

?>
