#### Uploadpictures

YII多图上传

```php

表单使用方式:
<?= $form->field($model, 'email')->widget(\common\listen\widgets\Uploadpictures\InputWidget::className()) ?>

模型的默认参数格式为:
[
    'image/image.png',
    'image/image.png',
    'image/image.png',
    'image/image.png',
    'image/image.png',
];

上传地址的action:
/**
 * 上传插件上传用得方法
 */
public function actionUploads()
{
    if ($_FILES['file']['error'] === 0) {
        $path = Upload::uploadEditor('file', 'editor');
        if ($path) {
            echo(json_encode(['error' => 0, 'pic' => Yii::getAlias('@web/' . $path), 'path' => $path]));
        } else {
            echo(json_encode(['error' => 1, 'message' => '上传失败']));
        }
    }
}

```