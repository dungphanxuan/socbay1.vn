<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/4/2018
 * Time: 10:48 AM
 */
/* @var $this yii\web\View */

$this->title = 'Submit Form';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="https://formspree.io/dungphanxuan999@gmail.com">

                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" required class="form-control" id="exampleInputPassword1" name='Địa chỉ email'
                           placeholder="Your email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" required class="form-control" id="exampleInputPassword1" name='Số điện thoại'
                           placeholder="Your mobile">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                              placeholder="Your message" rows="3"></textarea>
                </div>
                <input type="hidden" name="_language" value="vi"/>
                <input type="hidden" name="_subject" value="Liên hệ website!"/>

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>

