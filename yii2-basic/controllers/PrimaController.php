<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\RegForm;

class PrimaController extends AppController
{
    public $layout='basic';
    /*public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }*/

/*    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }*/

    public function actionIndex()
    {
        $this->view->title = "Начало";
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>'ключевики...']);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>'описание страницы...']);

        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegForm();
        //return $this->render('login', compact('model'));
        if($model->load(Yii::$app->request->post() )) {
            if ($model->validate()) {
                Yii::$app->session->setFlash('success', 'данные приняты');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'Ошибка принятия данных');
            }
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    public function actionAbout()
    {
        return $this->render('about');
    }
}
