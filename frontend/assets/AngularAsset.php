<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AngularAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css\site\angularTest.css'
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.3.16/angular.min.js',
        'js\site\angularComponents.js',
        'js\site\angularTest.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset',
    ];
}
