<?php

class AcessoPublicoPaginaDepoimentosCest
{
    public function paginaDepoimentosRenderiza(AcceptanceTester $I)
    {
      $I->amOnPage('/depoimentos');
      $I->amGoingTo('procurar por um depoimento');
      $I->see('A Rede Feminina para mim é o meu segundo lar, considero as voluntárias a minha segunda
      familia. Aqui o contato com cada uma delas é mais que amizade, podemos contar com um ombro amigo,
      conseguimos através delas remédios que não temos condições de comprar, frutas, cereais e cesta básica
      que nos ajuda e muito. Aqui nós pacientes somos muito bem acolhidos, onde me sinto muito bem,
      minha vida mudou muito depois que passei a freguentar a casa da Rede Feminina, mudou para melhor,
      hoje sou uma pessoa feliz');


    }

}
