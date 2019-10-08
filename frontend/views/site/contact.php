<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = Yii::t('frontend', 'Contact');
$this->params['breadcrumbs'][] = $this->title;

$temp_input_html = <<<HTML
<div class="col-md-12">
   {input}
   <div class="invalid-feedback" style="display: block">{error}</div>                          
</div>
HTML;

$itemSubject = [
    1 => 'Hỗ trợ thông tin website',
    2 => 'Phản hồi nội dung',
];
?>
    <div class="intro-inner">
        <div class="contact-intro">
            <div class="w100 map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115804.00398848252!2d105.77935508441719!3d20.995994640428048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSGFub2ksIEhvw6BuIEtp4bq_bSwgSGFub2k!5e0!3m2!1sen!2s!4v1515656353754"
                        width="100%" height="350" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-4">
                    <div class="contact_info">
                        <h5 class="list-title gray"><strong>Liên hệ</strong></h5>
                        <div class="contact-info ">
                            <div class="address">
                                <p class="p1">Hà Nội </p>
                                <p>Email: <a href="">dungphanxuan999</a>@gmail.com</p>
                                <p>Toll Free: 01667-158-269</p>
                                <p>&nbsp;</p>
                                <div>
                                    <p><strong><a href="#">Get a Quote</a></strong></p>
                                    <p><strong> <a href="<?php echo Url::to(['/user/sign-in/login']) ?>">Client Area
                                                Login</a></strong></p>
                                    <p><strong> <a href="#skypeid" class="skype">Live Chat</a></strong></p>
                                    <p><strong> <a href="<?php echo Url::to(['/site/faq']) ?>">Knowledge
                                                Base</a></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="social-list"><a target="_blank" href="https://twitter.com/"><i
                                        class="fa fa-twitter fa-lg "></i></a>
                            <a target="_blank" href="https://www.facebook.com/"><i
                                        class="fa fa-facebook fa-lg "></i></a>
                            <a target="_blank" href="https://plus.google.com"><i
                                        class="fa fa-google-plus fa-lg "></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <h5 class="list-title gray"><strong>Contact form</strong></h5>
                        <?php $form = ActiveForm::begin([
                            'id' => 'contact-form',
                            'options' => ['class' => 'form-horizontal'],
                        ]); ?>
                        <fieldset>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->field($model, 'name', [
                                        'template' => $temp_input_html
                                    ])->textInput([
                                        'maxlength' => true,
                                        'placeholder' => 'Tên liên hệ',
                                        'autocomplete' => 'off',
                                        'readonly' => true,
                                        'onfocus' => "this.removeAttribute('readonly');",
                                    ]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->field($model, 'company_name', [
                                        'template' => $temp_input_html
                                    ])->textInput([
                                        'maxlength' => true,
                                        'placeholder' => 'Tên công ty',
                                        'autocomplete' => 'off',
                                        'readonly' => true,
                                        'onfocus' => "this.removeAttribute('readonly');",
                                    ]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->field($model, 'email', [
                                        'template' => $temp_input_html
                                    ])->textInput([
                                        'maxlength' => true,
                                        'placeholder' => 'Địa chỉ Email',
                                        'autocomplete' => 'off',
                                        'readonly' => true,
                                        'onfocus' => "this.removeAttribute('readonly');",
                                    ]) ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->field($model, 'mobile', [
                                        'template' => $temp_input_html
                                    ])->textInput([
                                        'maxlength' => true,
                                        'placeholder' => 'Điện thoại',
                                        'autocomplete' => 'off',
                                        'readonly' => true,
                                        'onfocus' => "this.removeAttribute('readonly');",
                                    ]) ?>
                                </div>
                                <div class="col-lg-12">
                                    <?php echo $form->field($model, 'subject', [
                                        'template' => $temp_input_html
                                    ])->dropDownList($itemSubject, ['prompt' => 'Tiêu đề...'])
                                    ?>
                                </div>
                                <div class="col-lg-12">
                                    <?php echo $form->field($model, 'body', [
                                        'template' => $temp_input_html
                                    ])->textarea([
                                        'placeholder' => 'Nội dung liên hệ.',
                                        'class' => 'form-control contact-msg'
                                    ]) ?>
                                    <div class="form-group">
                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                            <input type="reset" class="btn btn-default btn-lg" value="Reset">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">
            <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please call the Classified Advertising department
                    at (000) 555-5555</h1>
                <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
                    <i class="icon-mobile"></i> <span class="hide-xs color50">Gọi ngay:</span> (000) 555-5555 </a>
            </div>
        </div>
    </div>

<?php
$app_css = <<<CSS
.contact-msg{
height: 130px;
}
CSS;
$this->registerCss($app_css);