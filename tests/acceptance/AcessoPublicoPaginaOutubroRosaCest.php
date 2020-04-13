<?php

class AcessoPublicoPaginaOutubroRosaCest
{
    public function paginaOutubroRosaRenderiza(AcceptanceTester $I)
    {
      $I->amOnPage('/outubro_rosa');
      $I->see('O movimento popular conhecido como Outubro Rosa');

    }

}
