<?php

namespace app\src\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{


   public function getViewPath()
	{
			return Yii::getAlias('@app/web/views/acesso_publico');
	}
	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
			return $this->render('home.mustache');
	}

}
