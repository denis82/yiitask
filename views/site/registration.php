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
		<h3 class="form-title font-green">Регистрация</h3>
		<div class="alert alert-danger display-hide">
		    <button class="close" data-close="alert"></button>
		    <span> Enter any username and password. </span>
		</div>
		<div class="form-group">
                    <?= $form->field($modelRegistration, 'login')
			      ->textInput(array('placeholder' => 'Email*', 'class' => 'form-control placeholder-no-fix'))
			      ->label('Email',['class'=>'control-label visible-ie8 visible-ie9']); ?>
                </div>

                <div class="form-group">
		    <?= $form->field($modelRegistration, 'name')
			      ->textInput(array('placeholder' => 'Имя*', 'class' => 'form-control placeholder-no-fix'))
			      ->label('Имя',['class'=>'control-label visible-ie8 visible-ie9']); ?>
                </div>
                <div class="form-group">
		    <?= $form->field($modelRegistration, 'password')
			      ->textInput(array('placeholder' => 'Пароль*', 'class' => 'form-control placeholder-no-fix'))
			      ->label('Пароль',['class'=>'control-label visible-ie8 visible-ie9']); ?>
                </div>
                <div class="form-group">
                    <?= $form->field($modelRegistration, 'rpassword')
			      ->textInput(array('placeholder' => 'Повтор пароля*', 'class' => 'form-control placeholder-no-fix'))
			      ->label('Повтор пароля',['class'=>'control-label visible-ie8 visible-ie9']); ?>
		</div>	      
                <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="tnc" /> Согласен на обработку 
                        <?= Html::a('персональных данных', "javascript:;",['class' => 'uppercase', "id" => "register-btn" ]) ?>
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
		<div class="form-actions">
		    <?= Html::submitButton('Отправить', ['class' => 'btn green uppercase']) ?>
		   
		    
		</div>


	<?php ActiveForm::end(); ?>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <!--<form class="forget-form" action="index.html" method="post">-->
            
            <!-- END REGISTRATION FORM -->
        </div>