<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 4/17/2018
 * Time: 10:35 AM
 */
?>
<div class="card bg-light card-body mb-3">
    <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium
    </h3>

    <p>Premium ads help sellers promote their product or service by getting
        their ads more visibility with more
        buyers and sell what they want faster. <a href="<?= Url::to(['/page/help']) ?>">Learn
            more</a></p>

    <div class="form-group row">
        <table class="table table-hover checkboxtable">
            <tr>
                <td>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
                                   name="exampleRadios" id="optionsRadios0"
                                   value="option1" checked>
                            Regular List
                        </label>
                    </div>

                </td>
                <td><p>$00.00</p></td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
                                   name="exampleRadios" id="optionsRadios1"
                                   value="option1">
                            <strong> Urgent Ad</strong>
                        </label>
                    </div>

                </td>
                <td><p>$10.00</p></td>
            </tr>
            <tr>
                <td>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
                                   name="exampleRadios" id="optionsRadios2"
                                   value="option2">
                            <strong> Top of the Page Ad</strong>
                        </label>
                    </div>


                </td>
                <td><p>$20.00</p></td>
            </tr>
            <tr>
                <td>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
                                   name="exampleRadios" id="optionsRadios3"
                                   value="option3">
                            <strong> Top of the Page Ad + Urgent Ad</strong>
                        </label>
                    </div>


                </td>
                <td><p>$40.00</p></td>
            </tr>
            <tr>
                <td>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <select class="form-control" name="Method"
                                    id="PaymentMethod">
                                <option value="2">Select Payment Method</option>
                                <option value="3">Credit / Debit Card</option>
                                <option value="5">Paypal</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td><p><strong>Payable Amount : $40.00</strong></p></td>
            </tr>
        </table>

    </div>
</div>
