<?php

use yii\helpers\Html;

$access = common\listen\widgets\Demo\DemoAsset::register($this);

echo '&nbsp;&nbsp;' . Html::button($title, [
        'class' => 'btn btn-primary',
        'style' => 'padding: 3px',
        'id' => 'btn'
    ]);
?>
<?php if ($attributeValue && is_array($attributeValue)): ?>
<br/>
<!-- col-lg-offset-2 -->
<div class="col-lg-12" style="border: 1px solid red;">
    <div class="row">
        <?php foreach ($attributeValue as $value): ?>
        <div class="col-lg-3" style="margin-top: 5px">
            <span class="badge" style="position: absolute; background-color: #ce4844; cursor: pointer" title="删除">X</span>
            <!--class="img-responsive"-->
            <img src="<?= $access->baseUrl . '/' . $value ?>"  alt="" class="img-responsive">
            <input type="hidden" name="<?= $attribute ?>[]" value="<?= $value ?>">
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
<script>
<?php $this->beginBlock('js_end') ?>

<?php $this->endBlock() ?>
</script>
<?php $this->registerJs($this->blocks['js_end'], $this::POS_END); ?>
