<?php 

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


use yii\bootstrap\ActiveForm;


AppAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?= Yii::$app->language ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
            <meta charset="<?= Yii::$app->charset ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <?= Html::csrfMetaTags() ?>
	    <title><?= Html::encode($this->title) ?></title>
	    <?php $this->head() ?>
	    <?php $this->registerCssFile('metronic/theme/assets/pages/css/login.min.css');?>
	    
    </head>
    <!-- END HEAD -->

    <body class=" login">
    <?php $this->beginBody() ?>
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
       
           <!-- BEGIN LOGIN FORM -->
           <?php echo $content; ?>

        <div class="copyright"> 2014 © Metronic. Admin Dashboard Template. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->

    <?php $this->endBody() ?>  
    <?php $this->registerJsFile('/metronic/theme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js');?>
    <?php $this->registerJsFile('/metronic/theme/assets/pages/scripts/login.min.js');?>
    </body>

</html>
<?php $this->endPage() ?>