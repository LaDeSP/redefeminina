<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller{
   

    public function actionIndex(){
        return $this->render('index.mustache');
    }
    
    public function actionParceiros(){
        return $this->render('parceiros.mustache');
    }
    
    public function actionComoAjudar(){
        return $this->render('como-ajudar.mustache');
    }

    
}
