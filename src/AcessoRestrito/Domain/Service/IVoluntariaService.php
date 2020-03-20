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
	public function login(Voluntaria $voluntaria);
	public function logout(Voluntaria $voluntaria);
	public function autorizarVoluntario(Voluntaria $voluntaria);
	public function atribuirUsuarioVoluntaria(Voluntaria $voluntaria);
	public function atualizarUsuarioVoluntaria(Voluntaria $voluntaria);
	public function removerUsuarioVoluntaria(string $usuario);
	
}

?>
