<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
	// BEGIN GLOBAL MANDATORY STYLES //
	"metronic/theme/assets/global/plugins/font-awesome/css/font-awesome.min.css",
	"metronic/theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css",
	"metronic/theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css",
	
	// END GLOBAL MANDATORY STYLES //
	
	// BEGIN PAGE LEVEL PLUGINS //
	'metronic/theme/assets/global/plugins/morris/morris.css',
	"metronic/theme/assets/global/plugins/codemirror/lib/codemirror.css",
	"metronic/theme/assets/global/plugins/codemirror/lib/codemirror.css",
        "metronic/theme/assets/global/plugins/codemirror/theme/neat.css",
        "metronic/theme/assets/global/plugins/codemirror/theme/ambiance.css",
        "metronic/theme/assets/global/plugins/codemirror/theme/material.css",
        "metronic/theme/assets/global/plugins/codemirror/theme/neo.css",
        
        // END PAGE LEVEL PLUGINS //
	
	// BEGIN THEME GLOBAL STYLES //
	
	'metronic/theme/assets/global/css/components.min.css',
	'metronic/theme/assets/global/css/plugins.min.css',
	
	// END THEME GLOBAL STYLES //
        
        // BEGIN THEME LAYOUT STYLES // 
        
        'metronic/theme/assets/layouts/layout/css/layout.min.css',
        "metronic/theme/assets/layouts/layout/css/themes/darkblue.min.css",
        "metronic/theme/assets/layouts/layout/css/custom.min.css",
        "metronic/theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css",
        
        // END THEME LAYOUT STYLES // 
        
	'css/site.css'
    ];
    public $js = [
    
	// BEGIN CORE PLUGINS //
        "metronic/theme/assets/global/plugins/jquery.min.js",
        "metronic/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js",
        "metronic/theme/assets/global/plugins/js.cookie.min.js",
        "metronic/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
        "metronic/theme/assets/global/plugins/jquery.blockui.min.js",
        "metronic/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",
        // END CORE PLUGINS //
        // BEGIN PAGE LEVEL PLUGINS //
        'metronic/theme/assets/global/plugins/morris/morris.min.js',
        'metronic/theme/assets/global/plugins/morris/raphael-min.js',
        "metronic/theme/assets/global/plugins/codemirror/lib/codemirror.js",
        "metronic/theme/assets/global/plugins/codemirror/mode/javascript/javascript.js",
        "metronic/theme/assets/global/plugins/codemirror/mode/htmlmixed/htmlmixed.js",
        "metronic/theme/assets/global/plugins/codemirror/mode/css/css.js",
        // END PAGE LEVEL PLUGINS //
        // BEGIN THEME GLOBAL SCRIPTS //
        "metronic/theme/assets/global/scripts/app.min.js",
        // END THEME GLOBAL SCRIPTS //
        // BEGIN PAGE LEVEL SCRIPTS //
        'metronic/theme/assets/pages/scripts/dashboard.min.js',
        //"metronic/theme/assets/pages/scripts/components-code-editors.min.js",
        // END PAGE LEVEL SCRIPTS //
        // BEGIN THEME LAYOUT SCRIPTS //
        "metronic/theme/assets/layouts/layout/scripts/layout.min.js",
        "metronic/theme/assets/layouts/layout/scripts/demo.min.js",
        "metronic/theme/assets/layouts/global/scripts/quick-sidebar.min.js",
        "metronic/theme/assets/layouts/global/scripts/quick-nav.min.js",
        "metronic/theme/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js",
        // END THEME LAYOUT SCRIPTS //
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
