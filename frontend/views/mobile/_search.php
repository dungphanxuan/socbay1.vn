<?php
/**
 * Created by PhpStorm.
 * User: dungpx
 * Date: 1/4/2018
 * Time: 3:50 PM
 */

?>

<form action="#" method="GET">
    <div class="row">
        <div class="col-md-3">
            <input class="form-control keyword" type="text" placeholder="e.g. Mobile Sale">
        </div>
        <div class="col-md-3">
            <select class="form-control selecter" name="category" id="search-category">
                <option selected="selected" value="">All Categories</option>
                <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;"
                        disabled="disabled">- Vehicles -
                </option>
                <option value="Cars">Cars</option>
                <option value="Commercial vehicles">Commercial vehicles</option>
                <option value="Motorcycles">Motorcycles</option>

                <option value="Other">Other</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control selecter" name="location" id="id-location">
                <option selected="selected" value="">All Locations</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="Other-Locations">Other Locations</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-block btn-primary  "><i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>


