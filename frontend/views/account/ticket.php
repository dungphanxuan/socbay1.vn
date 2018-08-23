<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Ticket';
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 page-sidebar">
                <?php echo $this->render('_menu', []) ?>
            </div>

            <div class="col-sm-9 page-content">
                <div class="inner-box">

                    <h2 class="title-2"><i class="fa fa-ticket"></i> Ticket </h2>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="<?php echo Url::to(['/ticket/create']) ?>">Thêm mới</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>


