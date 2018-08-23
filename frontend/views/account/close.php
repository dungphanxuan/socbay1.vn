<?php
/* @var $this yii\web\View */

$this->title = 'Khóa tài khoản';
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <?php echo $this->render('_menu', []) ?>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">
                    <h2 class="title-2"><i class="icon-cancel-circled "></i> Close account </h2>
                    <p>You are sure you want to close your account?</p>
                    <div><label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Yes
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> No
                        </label></div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>

        </div>

    </div>

</div>


