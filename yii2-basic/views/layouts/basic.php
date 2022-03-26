<?php
use app\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php $this->registerCsrfMetaTags() ?>
    <?=\yii\helpers\Html::tag("link",['rel'=>'stylesheet', 'href' =>'/.../web/css/style.css']) ?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php NavBar::begin(['brandLabel' => 'Avantie',
'options' => ['class' => 'navbar navbar-expand-md navbar-primary fixed-top']]);
echo Nav::widget([
    'items' => [
        ['label' => 'На главную', 'url' => ['/prima/index']],
        ['label' => 'Каталог', 'url' => ['/site/profile']],
        ['label' => 'Оплата', 'url' => ['/site/messages']],
        ['label' => 'Доставка', 'url' => ['/site/messages']],
        ['label' => 'О Нас', 'url' => ['/prima/about']],

        Yii::$app->user->isGuest ? (
        ['label' => 'Логин', 'url' => ['/prima/login'], ]
        ) : (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();
?>
<br>

<?php if(isset($this->blocks['block1'])):?>
    <? echo $this->blocks['block1'];?>
<?php endif;?>
        <?=$content?>
<?php ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
