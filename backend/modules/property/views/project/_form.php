<?php

use kartik\depdrop\DepDrop;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use trntv\filekit\widget\Upload;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model common\models\property\Project */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */
/* @var $categories */

$defaultKey = 'AIzaSyCNmTfwkNfWBggiPp060J19KlvDbDiJUS0';
$gmapApiKey = isset(Yii::$app->params['gmapApiKey']) ? Yii::$app->params['gmapApiKey'] : $defaultKey;

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=' . $gmapApiKey . '&callback=initMap&language=vi', ['position' => View::POS_END]);

?>

    <div class="project-form">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model, [
            'class' => 'alert alert-warning alert-dismissible',
            'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
        ]); ?>

        <?php echo $form->field($model, 'title', [
            'addon' => ['prepend' => ['content' => '<i class="fa fa-id-card-o"></i>']]
        ])->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'type')
                    ->dropDownList([1 => 'Cho thuê', 2 => 'Mua bán'], ['prompt' => 'Chọn loại dự án'])
                ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field($model, 'category_id', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-bars"></i>']],
                ])->dropDownList(ArrayHelper::map(
                    $categories,
                    'id',
                    'title'
                ), ['prompt' => 'Chọn danh mục...']) ?>
            </div>
        </div>

        <?php echo $form->field($model, 'short_des')->textarea(['rows' => 3]) ?>

        <?php
        echo $form->field($model, 'body')->widget(
            \froala\froalaeditor\FroalaEditorWidget::class,
            [
                'options' => [
                ],
                'csrfCookieParam' => '_csrf',
                'clientOptions' => [
                    'toolbarInline' => false,
                    'height' => 250,
                    'imageDefaultWidth' => 680,
                    'theme' => 'royal',
                    //'language'            => 'en_gb',
                    'language' => 'vi',
                    //'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
                    'imageUploadURL' => Url::to(['/file-storage/upload-froala']),
                    'fileUploadURL' => Url::to(['/file-storage/upload-froala']),
                    'imageManagerLoadURL' => Url::to(['/file-storage/file-froala'])
                ],
                //'clientPlugins' => [ 'fullscreen', 'paragraph_format', 'image', 'file', 'image_manager' ]
            ]
        )
        ?>

        <br>
        <hr class="b2r">
        <div class="row">
            <div class="col-md-4">
                <?php echo $form->field($model, 'level', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-bars"></i>']],
                ])->dropDownList(ArrayHelper::map(
                    $ranks,
                    'id',
                    'title'
                ), ['prompt' => 'Chọn hạng']) ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'price_id', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-usd"></i>']],
                ])->dropDownList(ArrayHelper::map(
                    $prices,
                    'id',
                    'title'
                ), ['prompt' => 'Chọn mức giá']) ?>
            </div>
            <div class="col-md-4">
                <?php echo $form->field($model, 'area_id', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-tree"></i>']],
                ])->dropDownList(ArrayHelper::map(
                    $areas,
                    'id',
                    'title'
                ), ['prompt' => 'Chọn diện tích']) ?></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'thumbnail')->widget(
                    Upload::class,
                    [
                        'url' => ['/file-storage/upload'],
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        'maxFileSize' => 10000000, // 10 MiB
                    ]);
                ?>
            </div>
            <div class="col-md-8">
                <?php echo $form->field($model, 'attachments')->widget(
                    Upload::class,
                    [
                        'url' => ['/file-storage/upload'],
                        'sortable' => true,
                        'maxFileSize' => 10000000, // 10 MiB
                        'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                        'maxNumberOfFiles' => 10
                    ]);
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'city_id', [
                ])->widget(Select2::class, [
                    'data' => ArrayHelper::map($cities, 'id', 'name'),
                    'language' => 'vi',
                    'options' => ['id' => 'ccity-id', 'placeholder' => 'Chọn Tỉnh/Thành Phố ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'district_id', [
                ])->widget(DepDrop::class, [
                    'options' => ['id' => 'cdistrict-id'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => $dataDistrict,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['ccity-id'],
                        'initialize' => true,
                        'initDepends' => ['ccity-id'],
                        'placeholder' => 'Chọn Quận/Huyện...',
                        'url' => Url::to(['/go/district/subcat'])
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'ward_id', [
                ])->widget(DepDrop::class, [
                    'options' => ['id' => 'ward-id'],
                    'type' => DepDrop::TYPE_SELECT2,
                    'data' => $dataWard,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                    'pluginOptions' => [
                        'depends' => ['cdistrict-id'],
                        'initialize' => true,
                        'initDepends' => ['cdistrict-id'],
                        'placeholder' => 'Chọn Phường/Xã...',
                        'url' => Url::to(['/go/ward/subcat'])
                    ]
                ]);
                ?>
            </div>
        </div>

        <div class="form-group field-project-lat">
            <label class="control-label" for="project-lat"> Address Map </label>
            <div class="row">
                <div class="col-sm-4" style="padding-left: 15px !important;">

                    <?php echo Html::activeTextInput($model, 'lat', [
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'id' => 'lat-value',
                        'placeholder' => 'Vĩ độ'
                    ]) ?>
                    <p></p>
                    <?php echo Html::activeTextInput($model, 'lng', [
                        'class' => 'form-control',
                        'autocomplete' => 'off',
                        'id' => 'lng-value',
                        'placeholder' => 'Kinh độ'
                    ]) ?>
                    <div class="row" style="margin-top: 30px">
                        <div class="col-md-12">
                            <div class="text-center">
                                <button class="btn btn-primary" type="button"><i class="fa fa-location-arrow"
                                                                                 aria-hidden="true"></i> Find Location
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8">
                    <div id="gmap" style="width: 100%;height: 250px">

                    </div>
                </div>

                <div class="help-block help-block-error "></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">  <?php echo $form->field($model, 'sort_number', [
                    'addon' => ['prepend' => ['content' => '<i class="fa fa-sort"></i>']],
                ])->textInput() ?></div>
            <div class="col-md-4">

            </div>
        </div>

        <?php echo $form->field($model, 'status')->checkbox() ?>

        <hr class="b2r">

        <div class="form-group">
            <div class="pull-left">
                <?php echo Html::submitButton($model->isNewRecord
                    ? 'Thêm mới' : 'Cập nhật',
                    ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <div class="pull-right">
                <?php echo Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Quay lại', ['index'], ['class' => 'btn btn-flat btn-default btn200']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php
$app_css = <<<CSS
.gmap {
    height: 100%;
    width: 100%;
}
CSS;
$this->registerCss($app_css);

$urlMapInfo = Url::to(['/ajax/lat-location']);

$js_form = <<<JS
$(document).on('keyup', '#city-address1', function () {
    if ($(this).val().length > 0) {
        findAddress();
    }
});
//findAddress();

$('#ccity-id').on('change', function () {
    var tid = this.value;
    findAddress(1, tid);
});

$('#cdistrict-id').on('change', function () {
    var tid = this.value;
    findAddress(2, tid);
});

$('#ward-id').on('change', function () {
    var tid = this.value;
    findAddress(3, tid);
});

function findAddress(type, tid) {
    $.ajax({
        url: '$urlMapInfo',
        type: 'GET',
        data: {type: type, tid: tid},
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                $('#lat-value').val(data.body.lat);
                $('#lng-value').val(data.body.lng);
                changeViewCenterMap(data.body.lat, data.body.lng)
            }
        }
    });
} 
JS;

$lat = ((!$model->isNewRecord && $model->lat) || ($model->isNewRecord && $model->lat)) ? $model->lat : 21.028511;
$lng = ((!$model->isNewRecord && $model->lng) || ($model->isNewRecord && $model->lat)) ? $model->lng : 105.804817;
$map_js = <<<JS
    var map;
var markers = [];

function initMap() {
    var haightAshbury = {lat: $lat, lng: $lng};
    map = new google.maps.Map(document.getElementById('gmap'), {
        center: haightAshbury,
        zoom: 11
    });

    google.maps.event.addListener(map, 'click', function (event) {
        //alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
        $("#lat-value").val(event.latLng.lat().toFixed(7));
        $("#lng-value").val(event.latLng.lng().toFixed(7));
        clearMarkers();
        addMarker(event.latLng);
    });
    addMarker(haightAshbury);
}

function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function (event) {
        $("#lat-value").val(event.latLng.lat().toFixed(7));
        $("#lng-value").val(event.latLng.lng().toFixed(7));
        clearMarkers();
        addMarker(event.latLng);
    });
    markers.push(marker);
}

function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

function clearMarkers() {
    setMapOnAll(null);
}

function changeViewCenterMap(lat, lng) {
    clearMarkers();
    var newP = new google.maps.LatLng(lat, lng);
    map.setCenter(newP);
    addMarker({lat: lat, lng: lng});
}
JS;

$this->registerJs($js_form);
$this->registerJs($map_js, View::POS_HEAD);

