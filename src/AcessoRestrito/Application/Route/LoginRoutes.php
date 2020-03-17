<?php

namespace App\AcessoRestrito\Application\Route;

use Slim\App;

use App\AcessoRestrito\Application\Action\LoginAction;
use App\AcessoRestrito\Application\ViewHelper\LoginRenderPage;

final class LoginRoutes
{

    public function getRoutes(): array
    {	
    	
    	$arr= array(
			'/login' => LoginAction::class,
			'/loginPage' => LoginRenderPage::class
    	);
    	
        return $arr;
    }
}

