<?php

namespace common\listen\widgets\Uploadpictures;

use yii\web\AssetBundle;


class DemoAsset extends AssetBundle
{
    public $sourcePath = '@common/listen/widgets/Demo/assets';

    public $css = [
    ];

    public $js = [
        'plupload.full.min.js',
        'js.js'
    ];

    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
