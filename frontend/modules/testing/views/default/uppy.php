<?php

use yii\helpers\Url;


/* @var $this yii\web\View */

\common\assets\Uppy::register($this);
?>
    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="testing-default-index">
                            <h1>Dashboard Uppy Example</h1>
                            <div class="UppyDragDrop"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
$urlFile = Url::to(['/file-storage/upload-uppy']);
$app_js = <<<JS
 var config = {
      id: 'uppy',
  autoProceed: false,
  debug: true,
   restrictions: {
    maxFileSize: 1000000,
    maxNumberOfFiles: 1,
    allowedFileTypes: ['image/*', 'video/*']
  }
 };
 var uppy = Uppy.Core(config)
 uppy.use(Uppy.Dashboard, {
  target: '.UppyDragDrop',
  inline: true,
  replaceTargetContent: true,
  maxWidth: 550,
  maxHeight: 350,
  semiTransparent: false,
  showProgressDetails: false,
  hideUploadButton: false,
  note: null,
  metaFields: [],
  closeModalOnClickOutside: false,
  disableStatusBar: false,
  disableInformer: false,
})
        //uppy.use(Uppy.DragDrop, { target: '.UppyDragDrop' })
        //uppy.use(Uppy.Tus, { endpoint: '$urlFile' })
        uppy.use(Uppy.XHRUpload, { endpoint: '$urlFile' })
        uppy.run()
JS;

$this->registerJs($app_js);

