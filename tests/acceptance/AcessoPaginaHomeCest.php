<?php

class AcessoPaginaHomeCest
{
    public function paginaHomeRenderiza(AcceptanceTester $I)
    {
      $I->amOnPage('/');
      $I->see('Rede');
      $I->see('Informações');
      $I->see('Quem somos');
    }
}
