<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

/* @var $this yii\web\View */

$this->title = Yii::t('backend', 'Application settings');
?>
<div class="row">
    <div class="col-md-3">
        <?php
        echo $this->render('_menu')
        ?>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-body">
                <?php echo \common\components\keyStorage\FormWidget::widget([
                    'model'         => $model,
                    'formClass'     => '\yii\bootstrap\ActiveForm',
                    'submitText'    => Yii::t('backend', 'Save'),
                    'submitOptions' => ['class' => 'btn btn-primary']
                ]); ?>
            </div>
        </div>
    </div>
</div>


