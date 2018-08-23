<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/21/2017
 * Time: 11:24 AM
 */

use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
]) ?>

<?php echo $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>