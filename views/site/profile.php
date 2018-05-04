<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
	<div class="col-md-6">
	    <!-- BEGIN SAMPLE TABLE PORTLET-->
		<?php if ( 0 < count($children) ): ?>
		<div class="portlet light bordered">
			<div class="portlet-title">
			    <div class="caption">
				<span class="caption-subject font-green bold uppercase">От вас пришли:</span>
			    </div>
			</div>
			<div class="portlet-body">
				<div class="table-scrollable">
				
					<table class="table table-hover">
					    <thead>
						<tr>
						    <th> # </th>
						    <th> Имя </th>
						    <th> Фамилия </th>
						    <th> Email </th>
						    <th> Статус </th>
						</tr>
					    </thead>
					    <tbody>
						  <?php foreach ( $children as $child):?>
						<tr>
						    <td> 1 </td>
						    <td> <?php echo $child->attributes['name']; ?> </td>
						    <td> <?php echo 'Фамилия';  ?> </td>
						    <td> <?php echo $child->attributes['login']; ?> </td>
						    <td> 2 </td>
						</tr>
						  <?php endforeach;?>
					    </tbody>
					</table>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="portlet light bordered">
			<div class="portlet-title">
			    <div class="caption">
				<span class="caption-subject font-green bold uppercase">От вас пока никто не пришел</span>
			    </div>
			</div>
		</div>
		<?php endif;?>
	    <!-- END SAMPLE TABLE PORTLET-->
	</div>
	<div class="col-md-6">
		<?php if ( isset($parent) ): ?>
			<span class="caption-subject font-green bold uppercase">Вы пришли от: <?= $parent->attributes['login']?></span>
		<?php else:?>
			<span class="caption-subject font-green bold uppercase">Вы пришли на сайт без приглашения </span>
		<?php endif;?>
	</div>
</div>
