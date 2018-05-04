<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Приглашалка';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content"> 
	<div class="portlet light bordered">
		<div class="portlet-title">
			  <div class="caption">
			      <span class="caption-subject font-blue-sharp bold uppercase">Приглашалка для друзей</span>
			  </div>		    
		</div>
		<div class="portlet-body form">
			<?php $form = ActiveForm::begin(['options' => ['role'=>'form']]);?>
				<div class="form-body">
					<div class="form-group">
					      <label>Для приглашения друга введите его почтовый адрес:</label>
					      <?= $form->field( $modelInvite , 'email')
						    ->textInput(array('placeholder' => 'email', 'class' => 'form-control input-lg'))
						    ->label('Email',['class'=>'control-label visible-ie8 visible-ie9']); ?>
					</div>
				</div>

				<div class="form-actions right">
				    <?= Html::submitButton('Отправить', ['class' => 'btn green ']) ?>  
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
