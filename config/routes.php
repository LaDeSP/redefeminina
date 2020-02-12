<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\Home\HomeAction::class);
    
    $app->get('/parceiros', \App\Action\Parceiros\ParceirosAction::class);
    
    $app->get('/depoimentos', \App\Action\Depoimentos\DepoimentosAction::class);
    
    $app->get('/contato', \App\Action\Contato\ContatoAction::class);
    
    $app->get('/luta_contra_cancer', \App\Action\LutaContraCancer\LutaContraCancerAction::class);
    
    $app->get('/outubro_rosa', \App\Action\OutubroRosa\OutubroRosaAction::class);
    
    $app->get('/como_ajudar', \App\Action\ComoAjudar\ComoAjudarAction::class);
};

