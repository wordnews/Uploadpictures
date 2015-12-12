<?php

namespace common\listen\widgets\Uploadpictures;

use yii\helpers\Html;

class InputWidget extends \yii\widgets\InputWidget
{
    /**
     * @var string 按钮上面的名称
     */
    public $title = '上传图片';

    public $class = '';
    /**
     * 初始化
     */
    public function init()
    {
//        echo Html::getAttributeValue($this->model, $this->attribute);
        parent::init();
    }


    public function run()
    {
        // 获取字段的值
//        $attributeValue = Html::getAttributeValue($this->model, $this->attribute);
        $attributeValue = [
            'image/image.png',
            'image/image.png',
            'image/image.png',
            'image/image.png',
            'image/image.png',
        ];

        return $this->render('index', [
            'title' => $this->title,
            'attribute' => $this->attribute,
            'attributeValue' => $attributeValue
        ]);
    }
}