<?php
/* @var $this yii\web\View */
$this->title = 'Api Document';
?>

<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

        <!-- Title -->
        <h3 class="mt-4">API Document</h3>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">Dung PX</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on January 1, 2017 at 12:00 PM</p>

        <hr>


        <h5>API Authentication</h5>
        <p>API xác thực người dùng</p>

        <h6>Http Request</h6>
        <p><code>Get: /user/oauth</code></p>

        <h6>Query Parameters</h6>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Parameters</th>
                <th scope="col">Default</th>
                <th scope="col">Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>token</td>
                <td>null</td>
                <td>API Authentication access token</td>
            </tr>

            </tbody>
        </table>

        <h6>Response</h6>

        <br>

        <div class="alert alert-primary" role="alert">
            This is a primary alert—check it out!
        </div>
        <hr>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#">Web Design</a>
                            </li>
                            <li>
                                <a href="#">HTML</a>
                            </li>
                            <li>
                                <a href="#">Freebies</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#">JavaScript</a>
                            </li>
                            <li>
                                <a href="#">CSS</a>
                            </li>
                            <li>
                                <a href="#">Tutorials</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
                You can put anything you want inside of these side widgets. They are easy to use, and feature the new
                Bootstrap 4 card containers!
            </div>
        </div>
        <div class="card my-4">
            <h5 class="card-header">Api Status</h5>
            <div class="card-body">
                <p style="color: green">Good</p>
            </div>
        </div>

    </div>

</div>
<!-- /.row -->

