<?php

use yii\helpers\Html;
use yii\helpers\Url;

$access = common\listen\widgets\Uploadpictures\DemoAsset::register($this);

echo '&nbsp;&nbsp;' . Html::button($title, [
        'class' => 'btn btn-primary',
        'style' => 'padding: 3px',
        'id' => 'btn'
    ]);
?>

<br/>
<!-- col-lg-offset-2 -->
<div class="col-lg-12">
    <div class="row image-list">
        <?php if ($attributeValue && is_array($attributeValue)): ?>
        <?php foreach ($attributeValue as $value): ?>
        <div class="col-lg-3" style="margin-top: 5px">
            <span class="badge" style="position: absolute; background-color: #ce4844; cursor: pointer" title="删除" onclick="delImage(this)">X</span>
            <!--class="img-responsive"-->
            <img src="<?= $access->baseUrl . '/' . $value ?>"  alt="" class="img-responsive">
            <input type="hidden" name="<?= $attribute ?>[]" value="<?= $value ?>">
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<script>
<?php $this->beginBlock('js_end') ?>

var uploader = new plupload.Uploader({//创建实例的构造方法
    runtimes: 'html5,flash,silverlight,html4', //上传插件初始化选用那种方式的优先级顺序
    browse_button: 'btn', // 上传按钮
    url: "<?= Url::to(['upload/uploads']) ?>", //远程上传地址
    flash_swf_url: 'plupload/Moxie.swf', //flash文件地址
    silverlight_xap_url: 'plupload/Moxie.xap', //silverlight文件地址
    filters: {
        max_file_size: '5mb', //最大上传文件大小（格式100b, 10kb, 10mb, 1gb）
        mime_types: [//允许文件上传类型
            {title: "files", extensions: "jpg,jpeg,png,gif"}
        ]
    },
    multi_selection: true, //true:ctrl多文件上传, false 单文件上传
    init: {
        FilesAdded: function(up, files) { //文件上传前
            if ($("#ul_pics").children("li").length > 30) {
                alert("您上传的图片太多了！");
                uploader.destroy();
            } else {
                uploader.start();
            }
        },
        FileUploaded: function(up, file, info) { //文件上传成功的时候触发
            var data = eval("(" + info.response + ")");
            $('.image-list').append('<div class="col-lg-3" style="margin-top: 5px"><span class="badge" style="position: absolute; background-color: #ce4844; cursor: pointer" title="删除" onclick="delImage(this)">X</span><img src="'+ data.pic +'"  alt="" class="img-responsive"><input type="hidden" name="<?= $attribute ?>[]" value="'+ data.path +'"> </div>');
        },
        Error: function(up, err) { //上传出错的时候触发
            alert(err.message);
        }
    }
});
uploader.init();

function delImage(obj)
{
    $(obj).parent().remove();
}

<?php $this->endBlock() ?>
</script>
<?php $this->registerJs($this->blocks['js_end'], $this::POS_END); ?>
