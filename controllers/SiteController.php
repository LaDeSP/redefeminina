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
    
    public function actionLutaContraOCancer(){
        return $this->render('luta-contra-o-cancer.mustache');
    }
    
    public function actionDepoimentos(){
        return $this->render('depoimentos.mustache');
    }
    
     public function actionContato(){
        return $this->render('contato.mustache');
    }

    
}
