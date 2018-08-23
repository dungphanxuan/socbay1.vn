<?php
/* @var $this yii\web\View */
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2"><i class="icon-user-add"></i> Create your account, Its free </h2>

                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal">
                                <fieldset>
                                    <div class="form-group  row  required">
                                        <label class="col-md-4 control-label">You are a <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="job-finder"
                                                           value="job finder" checked>
                                                    Employers </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="job-seeker"
                                                           value="job-seeker">
                                                    Job seekers </label>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Text input-->
                                    <div class="form-group  row  required">
                                        <label class="col-md-4 control-label">First Name <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <input name="" placeholder="First Name" class="form-control input-md"
                                                   required="" type="text">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group  row  required">
                                        <label class="col-md-4 control-label">Last Name <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <input name="textinput" placeholder="Last Name"
                                                   class="form-control input-md" type="text">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group  row  hide required forJobSeeker">
                                        <label class="col-md-4 control-label">Company Name <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <input name="" placeholder="Company Name" class="form-control input-md"
                                                   required="" type="text">
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group  row  required">
                                        <label class="col-md-4 control-label">Phone Number <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <input name="textinput" placeholder="Phone Number"
                                                   class="form-control input-md" type="text">

                                        </div>
                                    </div>

                                    <!-- Multiple Radios -->
                                    <div class="form-group  row  forJobFinder">
                                        <label class="col-md-4 control-label">Gender</label>

                                        <div class="col-md-6">
                                            <div class="radio">
                                                <label for="Gender-0">
                                                    <input name="Gender" id="Gender-0" value="1" checked="checked"
                                                           type="radio">
                                                    Male </label>
                                            </div>
                                            <div class="radio">
                                                <label for="Gender-1">
                                                    <input name="Gender" id="Gender-1" value="2" type="radio">
                                                    Female </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group  row  forJobFinder">
                                        <label class="col-md-4 control-label" for="textarea">About Yourself</label>

                                        <div class="col-md-6">
                                            <textarea class="form-control" id="textarea" name="textarea" rows="3">About Yourself</textarea>
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group  row  hide forJobSeeker">
                                        <label class="col-md-4 control-label" for="textareaSeeker">About Your
                                            Company</label>

                                        <div class="col-md-6">
                                            <textarea class="form-control" id="textareaSeeker" name="aboutcompnay"
                                                      rows="3">About Your Company</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group  row  required">
                                        <label for="inputEmail3" class="col-md-4 control-label">Email
                                            <sup>*</sup></label>

                                        <div class="col-md-6">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group  row  required">
                                        <label for="inputPassword3" class="col-md-4 control-label">Password </label>

                                        <div class="col-md-6">
                                            <input type="password" class="form-control" id="inputPassword3"
                                                   placeholder="Password">
                                            <small id="emailHelp" class="form-text text-muted">At least 5 characters.
                                            </small>

                                            <!--Example block-level help text here.--></p>
                                        </div>
                                    </div>
                                    <div class="form-group  row ">
                                        <label class="col-md-4 control-label"></label>

                                        <div class="col-md-8">
                                            <div class="termbox mb10">

                                                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description"> I have read and agree to the <a
                                                                href="terms-conditions.html">Terms
                                                        & Conditions</a> </span>
                                                </label>


                                            </div>
                                            <div style="clear:both"></div>
                                            <a class="btn btn-primary" href="job-account-home.html">Register</a>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.page-content -->

            <div class="col-md-4 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <div class="promo-text-box"><i class=" icon-briefcase fa fa-4x icon-color-1"></i>

                        <h3><strong>Post a Job </strong></h3>

                        <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. </p>
                    </div>
                    <div class="promo-text-box"><i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>

                        <h3><strong>Create and Manage Jobs</strong></h3>

                        <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                            Praesent tristique elit pharetra magna efficitur laoreet.</p>
                    </div>
                    <div class="promo-text-box"><i class="  icon-heart-2 fa fa-4x icon-color-3"></i>

                        <h3><strong>Create your Favorite Jobs list.</strong></h3>

                        <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                            Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.main-container -->

