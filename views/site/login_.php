<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="content">
	<?php $form = ActiveForm::begin(['options' => ['class'=>'login-form']]);?>
		<h3 class="form-title font-green">Авторизация</h3>
		<div class="alert alert-danger display-hide">
		    <button class="close" data-close="alert"></button>
		    <span> Enter any username and password. </span>
		</div>
		<div class="form-group">
		    <?= $form->field($modelLogin, 'login')
			      ->textInput(array('placeholder' => 'Ваше email', 'class' => 'form-control form-control-solid placeholder-no-fix'))
			      ->label('Логин',['class'=>'control-label visible-ie8 visible-ie9']); ?>
		</div>
		<div class="form-group">
		    <?= $form->field($modelLogin, 'password')
			      ->textInput(array('placeholder' => 'Пароль', 'class' => 'form-control form-control-solid placeholder-no-fix'))
			      ->label('Пароль',['class'=>'control-label visible-ie8 visible-ie9']); ?>
		</div>
		<div class="form-actions">
		    <?= Html::submitButton('Войти', ['class' => 'btn green uppercase']) ?>
		    <label class="rememberme check mt-checkbox mt-checkbox-outline">
			<input type="checkbox" name="LoginForm[rememberMe]" value="1" />Запомнить               
			<span></span>
		    </label>
		    <a href="javascript:;" id="forget-password" class="forget-password">Забыл пароль?</a>
		</div>

		<div class="create-account">
		    <p>
			<?= Html::a('Регистрация', "registration",['class' => 'uppercase', "id" => "register-btn" ]) ?>
		    </p>
		</div>
	<?php ActiveForm::end(); ?>
            <!-- END LOGIN FORM -->
 
        </div>