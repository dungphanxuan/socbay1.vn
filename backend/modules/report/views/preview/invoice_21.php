<?php
/* @var $this yii\web\View */

$this->registerCssFile(
    '@web/web/preview/css/invoice21.css'
);
?>
<section>
    <div class="container">
        <div class="details clearfix">
            <div class="client left">
                <p>INVOICE TO:</p>
                <p class="name">John Doe</p>
                <p>796 Silver Harbour, TX 79273, US</p>
                <a href="mailto:john@example.com">john@example.com</a>
            </div>
            <div class="data right">
                <div class="title">Invoice 3-2-1</div>
                <div class="date">
                    Date of Invoice: 01/06/2014<br>
                    Due Date: 30/06/2014
                </div>
            </div>
        </div>

        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th class="desc">Description</th>
                <th class="qty">Quantity</th>
                <th class="unit">Unit price</th>
                <th class="total">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="desc"><h3>Website Design</h3>Creating a recognizable design solution based on the company's
                    existing visual identity
                </td>
                <td class="qty">30</td>
                <td class="unit">$40.00</td>
                <td class="total">$1,200.00</td>
            </tr>
            <tr>
                <td class="desc"><h3>Website Development</h3>Developing a Content Management System-based Website</td>
                <td class="qty">80</td>
                <td class="unit">$40.00</td>
                <td class="total">$3,200.00</td>
            </tr>
            <tr>
                <td class="desc"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                <td class="qty">20</td>
                <td class="unit">$40.00</td>
                <td class="total">$800.00</td>
            </tr>
            </tbody>
        </table>
        <div class="no-break">
            <table class="grand-total">
                <tbody>
                <tr>
                    <td class="desc"></td>
                    <td class="qty"></td>
                    <td class="unit">SUBTOTAL:</td>
                    <td class="total">$5,200.00</td>
                </tr>
                <tr>
                    <td class="desc"></td>
                    <td class="qty"></td>
                    <td class="unit">TAX 25%:</td>
                    <td class="total">$1,300.00</td>
                </tr>
                <tr>
                    <td class="desc"></td>
                    <td class="unit" colspan="2">GRAND TOTAL:</td>
                    <td class="total">$6,500.00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="thanks">Thank you!</div>
        <div class="notice">
            <div>NOTICE:</div>
            <div>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
        <div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>
    </div>
</footer>


