<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Test List</h1>
<?php if (Yii::$app->session->hasFlash('success')):?>
<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</symbol>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Отлично! Данные приняты!
        </div>
    </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Данные не отправлены
        </div>
    </div>
    <?php echo Yii::$app->session->getFlash('error')?>
<?php endif; ?>
<?php $form = ActiveForm::begin(['options'=>['class'=> 'form-horizontal'], 'id'=>'RegForm']) ?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'password')->label('Пароль')->passwordInput()?>
<?= $form->field($model, 'email')?>
<?= $form->field($model, 'text')->textarea(['rows'=>4])?>
<?= Html::submitButton('Отправить', ['class'=>'btn btn-success' ])?>

<?php ActiveForm::end() ?>
