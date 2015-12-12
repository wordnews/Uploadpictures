<?php

namespace common\listen\widgets\Uploadpictures;

class DemoWidget extends \yii\base\Widget
{
    public $title = '上传图片';
    /**
     * 初始化
     * @see \yii\base\Object::init()
     */
    public function init()
    {
        parent::init();
    }


    public function run()
    {
        return $this->render('index', [
            'title' => $this->title
        ]);
    }
}