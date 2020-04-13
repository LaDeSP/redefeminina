<?php

class AcessoPublicoPaginaLutaContraCancerCest
{
    public function paginaLutaContraCancerRenderiza(AcceptanceTester $I)
    {
      $I->amOnPage('/luta_contra_cancer');
      $I->see('Câncer é o nome dado a um conjunto de várias doenças que têm em comum o crescimento');


    }

}
