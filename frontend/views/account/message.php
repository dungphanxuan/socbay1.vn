<?php

use frontend\assets\AdsAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Hộp thư tin';

$bundle = AdsAsset::register($this);
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 page-sidebar">
                <aside>
                    <?php echo $this->render('_menu', []) ?>
                </aside>
            </div>
            <!--/.page-sidebar-->

            <div class="col-md-9 page-content">
                <div class="inner-box">
                    <h2 class="title-2"><i class="fa fa-commenting-o"></i> Hộp thư tin </h2>

                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="list-group list-group-unstyle">
                                <li class="list-group-item active"><a href="#" class="">
                                        <span> Member...</span>
                                        <span class=" label label-warning">14+</span> </a> <span
                                            class="delete-search-result">&times;</span></li>
                                <li class="list-group-item "><a href="#" class="">
                                        <span> Member...</span> </a></li>

                            </ul>
                        </div>
                        <div class="col-sm-8">
                            <div class="adds-wrapper">
                                <div class="message-list">
                                    <div class="row">
                                        <div class="col-md-12 no-padding photobox">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!--/.item-list-->
                            </div>
                        </div>
                    </div>

                    <!--/.row-box End-->

                </div>
            </div>
            <!--/.page-content-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>


