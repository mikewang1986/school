<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('test.tpl',['test'=>'smarty']);
       // return $this->render('index');
    }
    public function actionTest() {
        return $this->render('test.tpl',['test'=>'smarty']);
    }
}