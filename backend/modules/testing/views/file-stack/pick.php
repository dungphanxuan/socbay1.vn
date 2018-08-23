<?php

use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = 'Pick';

$this->registerJsFile('https://static.filestackapi.com/v3/filestack.js')
?>

    <div class="testing-default-index">
        <h1><?php echo $this->context->action->uniqueId ?></h1>
        <button class="btn btn-info" id="btnPick">Pick</button>
    </div>

<?php
$app_js = <<<JS
var fsClient = filestack.init('AMKHHcdTF25H9V360VQhez');
  function openPicker() {
    fsClient.pick({
      fromSources:["local_file_system","imagesearch","facebook"],
      accept:["image/*"]
    }).then(function(response) {
      // declare this function to handle response
      handleFilestack(response);
    });
  }
  
  function handleFilestack(response) {
    console.log(response);
  }
  
  $('#btnPick').click(function() {
    openPicker();
  })
  $("#btnPick").click(function(){
    openPicker();
});
JS;

$this->registerJs($app_js);

