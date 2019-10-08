<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 12/12/2017
 * Time: 2:16 PM
 */

use yii\helpers\Html;
use yii\helpers\Url;
use common\models\ads\ReportReason;
use yii\bootstrap4\ActiveForm;
use common\models\ads\AdsReport;

/* @var $this yii\web\View */
/* @var $modalArticle \common\models\Article */

$model = new AdsReport();
?>
    <!-- Modal contactAdvertiser -->

    <div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class=" icon-mail-2"></i> Liên hệ với người bán </h4>

                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'contact-form',
                    ]) ?>
                    <?php
                    echo Html::activeHiddenInput($model, 'report_id', ['value' => $modalArticle->id]);
                    ?>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tên:</label>
                        <?php echo Html::textInput('rname', null, ['class' => 'form-control required', 'placeholder' => 'Tên liên hệ']) ?>
                    </div>
                    <div class="form-group">
                        <label for="recipient-Phone-Number" class="control-label">Số điện thoại:</label>
                        <?php echo Html::textInput('rphone', null, ['class' => 'form-control required', 'placeholder' => 'Sđt']) ?>
                    </div>
                    <div class="form-group">
                        <label for="sender-email" class="control-label">E-mail:</label>
                        <input id="sender-email" type="text"
                               data-placement="top" placeholder="email@you.com" class="form-control email">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nội dung <span
                                    class="text-count">(300) </span>:</label>
                        <textarea class="form-control" id="message-text" placeholder="Your message here.."
                                  data-placement="top" data-trigger="manual"></textarea>
                    </div>
                    <div class="form-group">
                        <p class="help-block pull-left text-danger show" id="form-error">&nbsp; The form is not
                            valid. </p>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-success pull-right" id="btnSendMsg">Gửi tin nhắn!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.modal -->

    <!-- Modal contactAdvertiser -->

    <div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa icon-info-circled-alt"></i>Gửi phản hồi bài viết</h4>

                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Đóng lại</span></button>
                </div>
                <div class="modal-body">
                    <?php
                    $form = ActiveForm::begin([
                        'id' => 'report-form',
                    ]) ?>
                    <?php
                    echo Html::activeHiddenInput($model, 'report_id', ['value' => $modalArticle->id]);
                    ?>

                    <?php echo $form->field($model, 'reason_id')->dropDownList(ReportReason::getAllItem())->label('Lý do báo cáo') ?>
                    <?php echo $form->field($model, 'user_email')->label('Địa chỉ Email') ?>
                    <?php echo $form->field($model, 'body')->textarea(['style' => 'height: 70px'])->label('Nội dung(300):') ?>
                    <?php ActiveForm::end() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" id="btnSendReport">Gửi</button>
                </div>
            </div>
        </div>
    </div>

<?php
$urlContactAgent = Url::to(['/ajax/contact-agent']);
$urlReport = Url::to(['/ajax/ads-report']);

$app_js = <<<JS
$("#btnSendMsg").click(function(){
    alert("The paragraph was clicked.");
});

$("#btnSendReport").click(function(){
    //alert("The paragraph was clicked.");
    
    $.ajax({
     url: '$urlReport',
     type: 'POST',
     data: $('#report-form').serialize(),
     success: function(data) {
         if(data.success){
             $('#reportAdvertiser').modal('hide');
             displayNotifier('report');
         }else{
             alert('đ');
         }
       
       return true;
     }
  });
});

function displayNotifier(mode) {
    if (mode == 'report') {
      alert('Gửi báo cáo bài viết thành công.')
    } else if (mode == 'contact') {
        $('#contactAdvertiser').modal('hide');
       $('#notifierPlace').show();
    } else {
      alert("We\'ll automatically notify the organizer when you're done making changes.");
    }
}
JS;

$this->registerJs($app_js);
