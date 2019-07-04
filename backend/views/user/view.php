<?php

use Da\TwoFA\Service\GoogleQrCodeUrlGeneratorService;
use Da\TwoFA\Service\TOTPSecretKeyUriGeneratorService;
use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $tokenModel \common\models\UserToken */

$this->title = 'View User' . ':' . $model->getPublicIdentity();
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$totpUri = (new TOTPSecretKeyUriGeneratorService('Cen', $model->email, $model->twofa_secret))->run();
$googleUri = (new GoogleQrCodeUrlGeneratorService($totpUri))->run();

?>
    <div class="user-view">

        <p>
            <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <div class="row">
            <div class="col-md-7">
                <?php echo DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'username',
                        'auth_key',
                        'email:email',
                        'twofa_secret',
                        'oauth_client_user_id',
                        'status',
                        'created_at:datetime',
                        'updated_at:datetime',
                        'logged_at:datetime',
                    ],
                ]) ?>
            </div>
            <div class="col-md-5">
                <h4>Two Factor Authentication</h4>
                <div class="text-center">
                    <img src="<?php echo $googleUri ?>" alt=""/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>API Application</h4>
                <div class="text-center">
                    <?php
                    if ($tokenModel) {
                        echo DetailView::widget([
                            'model' => $tokenModel,
                            'attributes' => [
                                'id',
                                'token',
                                'expire_at:datetime',
                                'created_at:datetime',
                            ],
                        ]);
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

<?php
$app_css = <<<CSS
.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #CFD8DC !important;
}
CSS;

$this->registerCss($app_css);
