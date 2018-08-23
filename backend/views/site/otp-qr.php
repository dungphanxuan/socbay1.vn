<?php

use Da\TwoFA\Service\GoogleQrCodeUrlGeneratorService;
use Da\TwoFA\Service\TOTPSecretKeyUriGeneratorService;

/* @var $this yii\web\View */

// first we need to create our time-based one time password secret uri
$totpUri = (new TOTPSecretKeyUriGeneratorService('Cen', $email, $secret))->run();
$googleUri = (new GoogleQrCodeUrlGeneratorService($totpUri))->run();

$this->title = 'Qr Code Setting';
?>
<div class="row">
    <div class="col-md-3">
        <?php
        echo $this->render('_menu')
        ?>
    </div>
    <div class="col-md-9">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">2factor Authentication (2FA)</h3>
            </div>
            <div class="box-body">
                <div class="text-center">
                    <img src="<?php echo $googleUri ?>" alt=""/>
                </div>
            </div>
        </div>
    </div>
</div>
