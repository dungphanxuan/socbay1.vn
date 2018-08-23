<?php
/* @var $this yii\web\View */
$this->title = 'Product';
?>
    <div class="ibox-content m-b-sm border-bottom">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="product_name">Product Name</label>
                    <input type="text" id="product_name" name="product_name" value="" placeholder="Product Name"
                           class="form-control">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="control-label" for="price">Price</label>
                    <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label class="control-label" for="quantity">Quantity</label>
                    <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity"
                           class="form-control">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="control-label" for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" selected="">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">

                    <table class="table table-stripped table-hover table-bordered">
                        <thead>
                        <tr>

                            <th data-toggle="true">
                                Product Name<span></span></th>
                            <th data-hide="phone">Model<span
                                ></span></th>
                            <th data-hide="all" style="display: none;">Description<span
                                ></span></th>
                            <th data-hide="phone">Price<span
                                ></span></th>
                            <th data-hide="phone,tablet" style="display: none;">Quantity<span
                                ></span></th>
                            <th data-hide="phone">Status<span
                                ></span></th>
                            <th data-sort-ignore="true">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="footable-even" style="">
                            <td class="footable-visible footable-first-column"><span class="footable-toggle"></span>
                                Example product 1
                            </td>
                            <td class="footable-visible">
                                Model 1
                            </td>
                            <td style="display: none;">
                                It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.
                            </td>
                            <td class="footable-visible">
                                $50.00
                            </td>
                            <td style="display: none;">
                                1000
                            </td>
                            <td class="footable-visible">
                                <span class="label label-primary">Enable</span>
                            </td>
                            <td class="text-right footable-visible footable-last-column">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs">Edit</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6" class="footable-visible">
                                <ul class="pagination pull-right">
                                    <li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a>
                                    </li>
                                    <li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li>
                                    <li class="footable-page active"><a data-page="0" href="#">1</a></li>
                                    <li class="footable-page"><a data-page="1" href="#">2</a></li>
                                    <li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li>
                                    <li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li>
                                </ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


<?php
$app_css = <<<CSS
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
CSS;
$this->registerCss($app_css);
