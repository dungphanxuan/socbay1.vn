<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
?>

    <select name="project" id="project">
        <?php
        echo $this->render('project/project_hcm', [
        ]) ?>
    </select>

<?php

$urlMapInfo = Url::to(['/property/default/ajax-store']);

$app_js = <<<JS
$("#project option").each(function()
{
    var item = $(this).text();
    console.log(item);
     $.ajax({
        url: '$urlMapInfo',
        type: 'POST',
        data: {text: item},
        dataType: 'json',
        success: function (data) {
            console.log('Done')
        }
    });
});
JS;

$this->registerJs($app_js);

