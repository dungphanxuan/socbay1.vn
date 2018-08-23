<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $urlView */

$this->title = 'Audio Play';

\common\assets\Plyr::register($this);

?>

    <div class="testing-default-index">
        <h1><?php echo $this->context->action->uniqueId ?></h1>
        <p>
            This is the view content for action "<?php echo $this->context->action->id ?>".
            The action belongs to the controller "<?php echo get_class($this->context) ?>"
            in the "<?php echo $this->context->module->id ?>" module.
        </p>
        <p>
            You may customize this page by editing the following file:<br>
            <code><?php echo __FILE__ ?></code>
        </p>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <audio id="player" controls>
                    <source src="<?php echo $urlView ?>" type="audio/mp3">
                </audio>
            </div>
            <div class="col-md-3"></div>

        </div>

    </div>

<?php
$app_js = <<<JS
const player = new Plyr('#player');
JS;

$this->registerJs($app_js);