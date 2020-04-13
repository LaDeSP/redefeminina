<?php

namespace App\AcessoRestrito\Domain\Service;

use App\AcessoRestrito\Domain\Entity\Voluntaria;

interface IUserService{

	public function login(Voluntaria $voluntaria);
	public function logout(Voluntaria $voluntaria);

}

?>
