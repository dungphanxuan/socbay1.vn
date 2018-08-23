<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/16/2018
 * Time: 11:02 AM
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="company-search">
    <?php echo $this->render('company/_search_popup', ['model' => $searchModel]); ?>
    <div id="search-result">
        <?php echo $this->render('company/_gridPopup', [
            'dataProvider' => $dataProvider
        ]) ?>
    </div>
</div>

<?php
$app_js = <<<JS
     $('body').on('click', '.page-link', function () {
            var form = $('#popup-form');
            var page = $(this).data('page') +1;
            var formData = $('#popup-form').serialize() + '&page='+page;
           
            // submit form
            $.ajax({
            url    : $('#popup-form').attr('action'),
            type   : 'get',
            data   : formData,
            success: function (response) 
            {
                $('#search-result').html(response);
               
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
         });
JS;
$this->registerJs($app_js);
?>
