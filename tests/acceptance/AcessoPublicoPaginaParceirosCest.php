<?php

class AcessoPublicoPaginaParceirosCest
{
    public function paginaParceirosRenderiza(AcceptanceTester $I)
    {
      $I->amOnPage('/');
      $I->amGoingTo('procurar pela palavra "Rede" no rodape');
      $I->see('Rede');


      $I->amGoingTo('procurar por elementos que ajudam a compor o grid de imagens dos Parceiros da Redefeminina');
      $I->seeElement('.img-thumbnail');
      $I->seeElement('.col-md');
      $I->seeElement('.container');
    }

}
