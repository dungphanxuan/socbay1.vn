<?php

use yii\web\View;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use kartik\money\MaskMoney;
use trntv\filekit\widget\Upload;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\data\ArticlePackage;
use dungphanxuan\vnlocation\models\City;
use froala\froalaeditor\FroalaEditorWidget;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $categories common\models\ArticleCategory[] */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $prices */
/* @var $areas */
/* @var $cities */
/* @var $dataSubCat */
/* @var $dataDistrict */
/* @var $dataWard */
/* @var $ranks */
/* @var $article_type */

$type = getParam('type', null);
$defaultKey = 'AIzaSyCNmTfwkNfWBggiPp060J19KlvDbDiJUS0';
$gmapApiKey = isset(Yii::$app->params['gmapApiKey']) ? Yii::$app->params['gmapApiKey'] : $defaultKey;
$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=' . $gmapApiKey . '&callback=initMap&language=vi', ['position' => View::POS_END]);

?>
<?php $form = ActiveForm::begin([
    /*'layout'      => 'horizontal',
    'fieldConfig' => [
        'template'             => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label'   => 'col-sm-2 col-xs-2',
            'wrapper' => 'col-sm-9 col-xs-9',
            'error'   => '',
            'hint'    => '',
        ],
    ],*/
]); ?>
    <fieldset>

        <?php echo $form->errorSummary($model, [
            'class'  => 'alert alert-warning alert-dismissible',
            'header' => ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-warning"></i> Vui lòng sửa các lỗi sau!</h4>'
        ]); ?>

        <?php echo Html::activeHiddenInput($model, 'lat', ['id' => 'ads-lat-value']) ?>
        <?php echo Html::activeHiddenInput($model, 'lng', ['id' => 'ads-lng-value']) ?>


        <div class="row">
            <div class="col-sm-6 col-md-6">
                <?php
                $jsChange = <<<JS
function switch_Cat() {
    $(this).children(':selected').each(function () {
        console.log($(this).val() + ' - ' + $(this).text());
        var catId = $(this).val();
    });
}
JS;

                echo $form->field($model, 'category_id', [
                ])->widget(\kartik\widgets\Select2::class, [
                    'data'          => ArrayHelper::map($categories, 'id', 'title'),
                    'options'       => [
                        'placeholder' => 'Danh mục ...',
                        'id'          => 'ccatid'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'addon'         => [
                        'append' => [
                            'content'  => '<a href="' . Url::to(['/article-category/create']) . '" target="_blank" class="fa fa-plus blue imouse"></a>',
                            'asButton' => false
                        ]
                    ],
                    'theme'         => Select2::THEME_BOOTSTRAP,
                    'pluginEvents'  => [
                        'change' => $jsChange
                    ],
                ]);
                ?>
            </div>
            <div class="col-sm-6 col-md-6">
                <?php
                echo $form->field($model, 'sub_category_id', [
                ])->widget(DepDrop::class, [
                    'options'        => ['id' => 'sub-cat-id'],
                    'type'           => DepDrop::TYPE_SELECT2,
                    'data'           => $dataSubCat,
                    'select2Options' => [
                        'pluginOptions' => ['allowClear' => true],
                        'theme'         => Select2::THEME_BOOTSTRAP,
                    ],
                    'pluginOptions'  => [
                        'depends'     => ['ccatid'],
                        'placeholder' => 'Danh mục con...',
                        'url'         => Url::to(['/ajax/category-subcat'])
                    ],
                ]);
                ?>
            </div>
        </div>

        <?php echo $form->field($model, 'title', [
        ])->textInput(['maxlength' => true, 'required' => '', 'title' => 'Tiêu đề bản tin', 'placeholder' => 'Tiêu đề bản tin']) ?>

        <?php
        /*echo $form->field($model, 'body')->widget(
            FroalaEditorWidget::class,
            [
                'options'         => [
                ],
                'csrfCookieParam' => '_csrf',
                'clientOptions' => [
                    'toolbarInline'       => false,
                    'height'              => 250,
                    'imageDefaultWidth'   => 680,
                    'theme'               => 'gray',//royal
                    'language'            => 'vi',
                    //'toolbarButtons' => ['fullscreen', 'bold', 'italic', 'underline', '|', 'paragraphFormat', 'insertImage'],
                    'imageUploadURL'      => Url::to(['/file-storage/upload-froala']),
                    'fileUploadURL'       => Url::to(['/file-storage/upload-file']),
                    'imageManagerLoadURL' => Url::to(['/file-storage/file-froala'])
                ],
                //'clientPlugins' => []
                'clientPlugins' => ['align', 'fullscreen', 'table', 'image', 'url', 'paragraph_format', 'word_paste', 'colors', 'code_view']
            ]
        );*/
        ?>

        <?php echo $form->field($model, 'body')->widget(
            \yii\imperavi\Widget::class,
            [
                'plugins' => ['fullscreen', 'fontcolor', 'video'],
                'options' => [
                    'minHeight'       => 200,
                    'maxHeight'       => 250,
                    'buttonSource'    => true,
                    'convertDivs'     => false,
                    'removeEmptyTags' => true,
                    'imageUpload'     => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi']),
                ],
            ]
        )->label('Mô tả');
        ?>

        <hr class="b2r">

        <div class="row">
            <div class="col-md-4">
                <?php
                echo $form->field($model, 'city_id', [
                ])->widget(Select2::class, [
                    'data'          => ArrayHelper::map($cities, 'id', 'name'),
                    'language'      => 'vi',
                    'options'       => ['id' => 'ccity-id', 'placeholder' => 'Chọn Tỉnh/Thành Phố ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'theme'         => Select2::THEME_BOOTSTRAP,
                ]);
                ?>
            </div>

            <div class="col-md-4">
                <?php
                echo $form->field($model, 'district_id', [
                ])->widget(DepDrop::class, [
                    'options'        => ['id' => 'cdistrict-id'],
                    'type'           => DepDrop::TYPE_SELECT2,
                    'data'           => $dataDistrict,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true], 'theme' => Select2::THEME_BOOTSTRAP,],
                    'pluginOptions'  => [
                        'depends'     => ['ccity-id'],
                        'initialize'  => true,
                        'initDepends' => ['ccity-id'],
                        'placeholder' => 'Chọn Quận/Huyện...',
                        'url'         => Url::to(['/go/ajax/district-subcat'])
                    ],
                ]);
                ?>
            </div>

            <div class="col-md-4">
                <?php
                $jsWardChange = <<<JS
function wardChange(event, id, value, count) { console.log(id); console.log(value); console.log(count); }
JS;

                $jsChangeWard = <<<JS
function switch_Cat() {
    $(this).children(':selected').each(function () {
        console.log($(this).val() + ' - ' + $(this).text());
        var catId = $(this).val();
    });
}
JS;

                echo $form->field($model, 'ward_id', [
                ])->widget(DepDrop::class, [
                    'options'        => ['id' => 'ward-id'],
                    'type'           => DepDrop::TYPE_SELECT2,
                    'data'           => $dataWard,
                    'select2Options' => ['pluginOptions' => ['allowClear' => true], 'theme' => Select2::THEME_BOOTSTRAP,],
                    'pluginOptions'  => [
                        'depends'     => ['cdistrict-id'],
                        'initialize'  => true,
                        'initDepends' => ['cdistrict-id'],
                        'placeholder' => 'Chọn Phường/Xã...',
                        'url'         => Url::to(['/go/ajax/ward-subcat'])
                    ],
                    'pluginEvents'   => [
                        'change' => $jsChangeWard
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo $form->field($model, 'address_text', [
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon" id="btnMarker"><i class="fa fa-map-marker"></i></span>{input}</div>',

                ])->textInput(['maxlength' => true, 'required' => '', 'id' => 'inputAddress', 'title' => 'Địa chỉ', 'placeholder' => 'Địa chỉ'])
                    ->label('Địa chỉ bản tin') ?>
            </div>
        </div>

        <?php echo $form->field($model, 'thumbnail')->widget(
            Upload::class,
            [
                'url'             => ['/file-storage/upload'],
                'maxFileSize'     => 5000000, // 5 MiB
                'acceptFileTypes' => new JsExpression('/(\.|\/)(jpe?g|png)$/i'),
            ])->label('Ảnh thumbnail');
        ?>

        <?php echo $form->field($model, 'attachments')->widget(
            Upload::class,
            [
                'url'              => ['/file-storage/upload'],
                'sortable'         => true,
                'maxFileSize'      => 10000000, // 10 MiB
                'maxNumberOfFiles' => 10,
                'acceptFileTypes'  => new JsExpression('/(\.|\/)(jpe?g|png)$/i'),
            ])->label('Ảnh slider');
        ?>

        <div class="row">
            <div class="form-group">
                <label class="col-md-2 control-label" for="Price">Giá SP</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <?php
                        //echo Html::activeInput('text', $model, 'price', ['class' => 'form-control', 'required' => ''])
                        ?>
                        <?php
                        echo MaskMoney::widget([
                            'model'         => $model,
                            'attribute'     => 'price',
                            'pluginOptions' => [
                                'prefix'    => 'đ ',
                                'thousands' => ' ',
                                'precision' => 0
                            ],
                            'options'       => [
                                'maxlength' => '16'
                            ]
                        ]);
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox">
                        <?php echo Html::activeCheckbox($model, 'is_negotiable', ['label' => 'Thương lượng']) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label class="col-md-2 control-label">Public</label>
                <div class="col-md-8" style="padding-top: 7px">
                    <?php echo Html::activeRadioList($model, 'public_flg', [1 => 'Xuất bản', 0 => 'Nháp']) ?>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="content-subheading" style="margin: 30px 0 !important;">
                <i class="icon-user fa"></i> <strong><?php echo Yii::t('common', 'Seller information') ?></strong>
            </div>
        </div>

        <div class="form-horizontal">

            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput-name">Tên</label>
                <div class="col-md-8">
                    <input id="textinput-name" name="textinput-name" placeholder="Seller Name"
                           class="form-control input-md" type="text">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="seller-email"> Địa chỉ Email</label>
                <div class="col-md-8">
                    <input id="seller-email" name="seller-email" class="form-control"
                           placeholder="Email" type="text">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="seller-Number">Số điện thoại</label>
                <div class="col-md-8">
                    <input id="seller-Number" name="seller-Number" placeholder=""
                           class="form-control input-md" type="text">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            <small> <?php echo Yii::t('ads', 'Hide the phone number on this ads.') ?></small>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="seller-Location">Địa chỉ</label>
                <div class="col-md-8">
                    <?php
                    echo Html::textInput('seller-address', null, ['class' => 'form-control'])
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="seller-area">Tỉnh/Thành Phố</label>
                <div class="col-md-8">
                    <?php
                    //echo Html::dropDownList('seller-Location', null, City::getList(), ['class' => 'form-control']);
                    ?>
                    <?php
                    echo Select2::widget([
                        'name'    => 'state_10',
                        'data'    => City::getList(),
                        'size'    => Select2::MEDIUM,
                        'theme'   => Select2::THEME_BOOTSTRAP,
                        'options' => [
                            'class'       => 'form-control',
                            'id'          => 'sLocation',
                            'placeholder' => 'Chọn tỉnh/tp ...',
                        ],
                    ]);
                    ?>
                </div>
            </div>

            <div class="well">
                <h3><i class=" icon-certificate icon-color-1"></i> <?php echo Yii::t('ads', 'Make your Ad Premium') ?>
                </h3>
                <p>Quảng cáo tin của bạn, hiển thị ở những vị trí trang nhiều hơn làm sản phẩm tiếp cận được nhiều khách
                    hàng và bán sản phẩm nhanh chóng. <a href="<?php echo Url::to(['/page/help-promo']) ?>">Xem thêm</a>
                </p>
                <div class="form-group">
                    <table class="table table-hover checkboxtable">
                        <?php
                        echo $form->field($model, 'package_id')
                            ->radioList(
                                ArticlePackage::getList(),
                                [
                                    'item' => function ($index, $label, $name, $checked, $value) use ($model) {

                                        $isChecked = $checked ? 'checked' : '';
                                        $isDisable = $model->isNewRecord ? '' : 'disabled';
                                        /** @var ArticlePackage $modelP */
                                        $modelP = ArticlePackage::find()->where(['id' => $value])->one();
                                        $tempHtml = <<<HTML
<tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="$name" class="inputPromo" data-price="$modelP->price"
                                               id="optionsRadios$index" value="$value" $isChecked $isDisable >
                                        <strong>$modelP->title </strong> </label>
                                </div>
                            </td>
                            <td><p>đ $modelP->price</p></td>
                        </tr>
HTML;
                                        return $tempHtml;
                                    }
                                ]

                            )->label(false);
                        ?>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <select class="form-control" name="Method" id="PaymentMethod">
                                            <option value="2"><?php echo Yii::t('common', 'Select Payment Method') ?></option>
                                            <option value="3">Tiền mặt</option>
                                            <option value="4">Thẻ ATM</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td><p><strong><?php echo Yii::t('ads', 'Payable Amount') ?> : đ <span
                                                id="totalAmount">0</span></strong></p></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"><?php echo Yii::t('common', 'Terms') ?></label>
                <div class="col-md-8">
                    <label class="checkbox-inline" for="checkboxes-0">
                        <input name="checkboxes" id="checkboxes-0"
                               value="Remember above contact information." type="checkbox">
                        <?php echo Yii::t('ads', 'Remember above contact information') ?> </label>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <hr class="b2r">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 col-2 control-label"></label>
            <div class="col-md-8">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('common', 'Post Ads') : Yii::t('common', 'Update Ads'), ['class' => $model->isNewRecord ? 'btn btn-success btn-lg btn-custom' : 'btn btn-primary btn-lg btn-custom', 'data-style' => 'expand-right']) ?>
            </div>
            <div class="col-md-2">
                <div class="pull-right">
                    <?php echo Html::a('<span class="fa fa-arrow-left"></span> ' . Yii::t('common', 'Back'), ['/ads/index'], ['class' => 'btn btn-lg btn-default hide-mobile']); ?>
                </div>
            </div>
        </div>
    </fieldset>
<?php ActiveForm::end(); ?>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalMarker">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Bản đồ</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <div class="input-group">
                            <input type="text" id="inputAddressMap" class="form-control" placeholder="Địa chỉ bản tin"
                                   aria-describedby="btnFindAdd">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" id="btnFindAdd">Tìm kiếm!</button>
                                </span>
                        </div>
                    </div>
                    <div id="gmap" style="width: 100%;height: 350px">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnSelectMap">Chọn</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php
$app_css = <<<CSS
.gmap{
height: 100%;
width: 100%;
}
@media (max-width: 480px) {
    .btn-custom {
        width: 100%;
        display: block;
    }

    .hide-mobile {
        display: none;
    }
}

.select2-selection {
    height: 38px !important;
}

.field-article-attachments .upload-kit .upload-kit-item.image > img {
    max-width: 195px !important;
}
#btnFindAdd{
cursor: pointer;
}
.b2r {
    height: 2px;
    border-top: 2px solid #2ECC71;
}

CSS;
$this->registerCss($app_css);

$app_js = <<<JS
//$('#modalMarker').modal('show');
$('input[type=radio][class=inputPromo]').change(function() {
    var vPromoPrice = $(this).data("price");
    console.log(vPromoPrice);
        $("#totalAmount").text(vPromoPrice);
});

$("#btnMarker").click(function(){
    $('#modalMarker').modal('show')
});
$("#btnSelectMap").click(function(){
    //Set map location
    $('#modalMarker').modal('hide')
});
JS;

$this->registerJs($app_js);

$urlMapInfo = Url::to(['/ajax/map-info', 'type' => 'geo']);

$js_form = <<<JS
    
    $("#btnFindAdd").click(function(){
        if($('#inputAddressMap').val().length > 0){findAddress();}
    });
    //findAddress();
    
    function findAddress() {
      var add =  $('#inputAddressMap').val();
      
      $.ajax({
               url : '$urlMapInfo',
               type : 'POST',
               data : {add:add},
               dataType: 'json',
               success : function(data) {
                   if(data.success){
                      $('#ads-lat-value').val(data.body.lat);
                      $('#ads-lng-value').val(data.body.lng);
                      changeViewCenterMap(data.body.lat, data.body.lng)
                   }
               }
      });
    }
JS;
$this->registerJs($js_form);

$lat = ((!$model->isNewRecord && $model->lat) || ($model->isNewRecord && $model->lat)) ? $model->lat : 21.028511;
$lng = ((!$model->isNewRecord && $model->lng) || ($model->isNewRecord && $model->lat)) ? $model->lng : 105.804817;
$map_js = <<<JS
    var map;
    var markers = [];
    
    function initMap() {
        var haightAshbury = {lat: $lat, lng: $lng};
        map = new google.maps.Map(document.getElementById('gmap'), {
            center: haightAshbury,
            zoom: 15
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


$this->registerJs($map_js, View::POS_HEAD);