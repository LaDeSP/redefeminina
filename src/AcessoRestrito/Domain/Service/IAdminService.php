<?php

namespace App\AcessoRestrito\Domain\Service;

use App\AcessoRestrito\Domain\Entity\Voluntaria;

interface IAdminService{

	public function autorizarVoluntario(Voluntaria $voluntaria);
	public function atribuirUsuarioVoluntaria(Voluntaria $voluntaria);
	public function atualizarUsuarioVoluntaria(Voluntaria $voluntaria);
	public function removerUsuarioVoluntaria(string $usuario);

}

?>
