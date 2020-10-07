<style>

    .body {
        background-color: #f5f7fa;
        font-family: PayPal-Sans-Big, Helvetica Neue, Arial, sans-serif;
    }

    input, select {
        border-radius: 10px !important;
    }

    .header {
        text-align: left;
        padding: 10px;
        background-color: #f5f7fa;

        box-sizing: border-box;


        width: 100%;
        z-index: 99999;
    }

    .header .logo {
        text-align: left;
    }

    .header .logo img {

    }

    .form-worning {
        font-weight: bold;
        color: red;
        display: none;
    }

    .menu {
        margin-top: 25px;
        float: right;
    }

    .menu ul {
        margin: 0px;
        padding: 0px;
    }

    .menu ul li {
        list-style-type: none;
        display: inline-block;
    }

    .menu ul li a {
        padding: 10px;
        color: #000000;
        text-decoration: none;
        font-weight: bold;
        transition: 1s;
    }

    .menu ul li a:hover {
        color: rgba(0, 0, 0, .6);
    }

    .wpmk-form {
        width: 50%;
        margin: auto;
        margin-top: 0px;
        box-sizing: border-box;
        padding: 15px;
        border: 1px solid #EDEDED;
        box-shadow: 0px 0px 10px 5px #EDEDED;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #FFFFFF;
        border-radius: 5px;
    }

    .wpmk-form form {
        overflow: hidden;
        margin-bottom: 50px;
    }

    .wpmk-form .checkbox label {
        padding-left: 0px;
    }

    .amount-wrap,
    .footer-wrap {
        width: 50%;
        float: left;
        box-sizing: border-box;
        padding-right: 10px;
    }

    .footer-wrap {
        text-align: left;
    }

    .footer-wrap img {
        width: 50%;
    }

    .amount-wrap select,
    .amount-wrap input {
        width: 100%;
    }

    .wpmk-form .checkbox {
        float: left;
        width: 100%;
    }

    #other-wrap {
        display: none;
    }

    .mubeen-submit {
        text-align: right;
        width: 200px;
        float: right;
        margin-top: 25px;
    }

    .mubeen-submit input {
        padding: 10px;
        font-size: 20px;
        border-radius: 5px !important;
    }

    .my-warning {
        width: 100%;
        display: none;
    }

    .popup-window {
        position: fixed;
        top: 72px;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 25px;
        height: 100%;
        display: none;
    }

    .popup-window .popup-close {
        color: #ffffff;
        position: absolute;
        right: 0px;
        top: 0px;
        background-color: #002d8a;
        box-sizing: border-box;
        padding: 5px 9px;
        width: 25px;
        height: 25px;
        font-weight: bold;
        cursor: pointer;
        z-index: 9999;
    }

    .popup-window .popup-content {
        background-color: #FFFFFF;
        padding: 20px 12px;
        font-size: 12px;
        position: relative;
        overflow: hidden;
    }

    .popup-window .popup-content p {
        text-align: center;
        color: #002d8a;
        font-size: 15px;
    }

    .btn-paypal {
        color: #fff;
        background-color: #002d8a;
        border-color: #002d8a;
    }

    .btn-paypal:hover {
        color: #fff !important;
    }

    p.form-text-head {
        font-family: PayPal-Sans-Big, Helvetica Neue, Arial, sans-serif;
        text-align: center;
        margin-bottom: 25px;
        font-size: 25px;
        padding-left: 50px;
        padding-right: 50px;
        /*text-transform: capitalize;*/
    }

    .form-footer {
        border-top: 2px dotted #cbd2d6;
        margin-top: 20px;
    }

    .copy-right-text {
        font-family: PayPal-Sans-Big, Helvetica Neue, Arial, sans-serif;
        margin-top: 10px;
        text-align: center;
    }

    .footer-links {
        font-family: PayPal-Sans-Big, Helvetica Neue, Arial, sans-serif;
        margin-top: 10px;
        text-align: center;
    }

    .footer-links ul {
        margin: 0px;
        padding: 0px;
    }

    .footer-links ul li {
        list-style-type: none;
        display: inline-block;
        margin-right: 5px;
    }

    .footer-links ul li a {
        color: #333;
        text-decoration: none;
        font-family: PayPal-Sans-Big, Helvetica Neue, Arial, sans-serif;
    }

    .footer-links ul li a:hover {
        color: #000;
    }

    @media (max-width: 426px) {
        .wpmk-form {
            width: 100%;
        }

        .amount-wrap {
            width: 100%;
        }

        .menu {
            display: none;
        }

        .amount-wrap,
        .footer-wrap {
            padding-right: 0px;
        }

        .header {
            text-align: center;
        }

        .footer-wrap img {
            width: 70%;
        }

        .footer-wrap {
            text-align: center;
        }

        .copy-right-text {
            margin-top: 20px;
        }
    }
</style>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="euc-jp">

    <meta name="author" content="mubeenkhan"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"
          media="all"/>

    <meta name="author" content="Mwangi Muthui(0721257308)/>
    <meta name="MobileOptimized" content="320"/>
    <!--favicon-->
    <link rel="shortcut icon" href="http://127.0.0.1:8000/images/front_logo/pfa-2.png" type="image/x-icon">
    {{-- slider maneno --}}
    <link rel="stylesheet" href="style.css" type="text/css" media="all"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//db.onlinewebfonts.com/c/44994582bcefd02119158ff8b0d16b75?family=PayPal+Sans+Big" rel="stylesheet"
          type="text/css"/>
    <title>PayPal Form | PFA</title>

</head>

<body class="body">
<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12">
            <div class="logo">
                <a href="https://pfaccounts.com/">
                    <img src="<?=url('/images/front_logo/pfa-2.png')?>" height="50" width="100"/>
                </a>
            </div>
        </div>
    </div>
</div>


<?php //echo '<pre>';
// echo print_r($products);
session_start(); ?>
<div class="container">
    <div class="wpmk-form">
        <p class="form-text-head">
            Make payment for services via PayPal
        </p>
        <div class="form-group">
            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" class="form-control" placeholder="First Name"
                   required="required"/>
            <div class="form-worning fn">Please fill this field</div>
        </div>

        <div class="form-group">
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" class="form-control" placeholder="Last Name"
                   required="required"/>
            <div class="form-worning ln">Please fill this field</div>
        </div>

        <div class="form-group">
            <label for="email-address">Paypal Email Address</label>
            <input type="email" id="email-address" name="email-address" class="form-control"
                   placeholder="example@example.com" required="required"/>
            <div class="form-worning pay">Please fill this field</div>
        </div>

        <div class="form-group">
            <label for="services">Services</label>
            <select name="service-name-select" class="form-control" id="services" required="required"
                    onchange="getNewVal(this);">
                <option value="">Select Services</option>

                <?php

                foreach($products as $prod){?>

                <option value="<?=$prod->products_name?>"><?=$prod->products_name?></option>

            <?php } ?>

            <!--<option value="voiceovers">Voiceovers</option>
                    <option value="writing Services">Writing Services</option>
                    <option value="graphic Design">Graphic Design</option>
                    <option value="others" >Other s</option>-->
            </select>
            <div class="form-worning sel">Please fill this field</div>
        </div>
        <div class="form-group otherServices">
            <label for="email-address" id="service-name-input-label">Other Service Details</label>
            <input type="text" id="service-name-input" name="service-name-input" class="form-control"
                   placeholder="Other Service Detail"/>


            <div class="form-worning pay">Please fill this field</div>
        </div>


        <div class="amount-wrap">
            <div class="form-group if-error">
                <label for="enter-amount">Enter Amount</label>
                <input type="number" id="enter-amount" name="enter-amount" class="form-control" min="0" step=".01"
                       placeholder="0.00" required="required"/>
                <div class="my-warning">Please add amount like : <code>10.00</code></div>
                <div class="form-worning amo-war">Amount must be a numerical value with two decimal places</div>
                <div class="form-worning amo">Please fill this field</div>
            </div>
        </div>

        <div class="amount-wrap">
            <div class="form-group">
                <label for="currency-type">Currency Type</label>
                <select class="form-control" name="currency-type" id="currency-type" required="required">
                    <option value="">Select Currency</option>
                    <option value="USD">USD</option>
                    <option value="GBP">GBP</option>
                    <option value="EUR">EUR</option>
                </select>
                <div class="form-worning cur">Please fill this field</div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="footer-wrap">
            <div class="checkbox">
                <!--<label for="paypal">
                    <img src="images/paypal.png" alt="Paypal"/>
                </label>-->
            </div>
        </div>

        <div class="footer-wrap">
            <div class="mubeen-submit">
                <input type="submit" name="submit-form" id="submit-form" class="btn btn-paypal" value="Pay via PayPal"/>
            </div>
        </div>

        <div style="clear: both;"></div>
        <div class="form-footer">
            <div class="col-md-6 copy-right-text">
                &copy; 2019 - <?php echo date('Y'); ?> PFA ®. All rights reserved.
            </div>
            <div class="col-md-6">
                <div class="footer-links">
                    <ul>
                        <li><a href="https://pfaccounts.com/#About_sec" target="_blank">About</a></li>
                        <li><a href="https://pfaccounts.com/#Contact_sec" target="_blank">Contact</a></li>
                        <li><a href="https://pfaccounts.com/#" target="_blank">Privacy</a></li>
                        <li><a href="https://pfaccounts.com/#Key_sec" target="_blank">Services</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="popup-window">
    <div class="popup-content">
        <div class="popup-close">X</div>
        <p>Please confirm your order</p>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th class="first-name">Mubeen uddin</th>
            </tr>
            <tr>
                <th>Last Name</th>
                <th class="last-name">Khan</th>
            </tr>
            <tr>
                <th>Paypal Email Address</th>
                <th class="email-address">mubeenkhan@live.com</th>
            </tr>
            <tr>
                <th>Service</th>
                <th class="service">Web Development</th>
            </tr>
            <tr>
                <th>Amount</th>
                <th class="amount">$400</th>
            </tr>
            <tr>


                <th>Currency Type</th>
                <th class="currency">USD</th>
            </tr>
        </table>

        <form action="{{$url}}" method="post">
            <!-- Paypal -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="cmd" value="_xclick"/>
            <!--<input type="hidden" name="charset" value="utf-8" />-->
            <input type="hidden" name="business" class="business" value="{{$paypal_id}}"/>
            <input type="hidden" name="item_name" class="item_name" value="serv"/>
            <!--<input type="hidden" name="item_number" value="" />-->
            <input type="hidden" name="amount" class="amount-paypal" value=""/>
            <input type="hidden" name="currency_code" class="currency_code" value=""/>
            <input type='hidden' name='cancel_return' value='<?=url('/cancel');?>'/>
            <input type='hidden' name='return' value='<?=url('/success');?>'/>
            <!-- #Paypal -->
            <div class="mubeen-submit">
                <input type="submit" name="submit-form" id="submit-forms" class="btn btn-paypal"
                       value="Pay via PayPal"/>
            </div>

        </form>

    </div>
</div>
<script src="script.js"></script>
</body>
</html>


<script>


    jQuery('#services').change(function () {
        var services = jQuery(this).val();
        if (services == 'Other') {
            jQuery("#other-wrap").css("display", "block");
        } else {
            jQuery("#other-wrap").css("display", "none");
        }
    });
    jQuery("#submit-form").click(function () {
        var firstname = jQuery('#first-name').val();
        var lastname = jQuery('#last-name').val();
        var emailaddress = jQuery('#email-address').val();
        var services = jQuery('#services').val();

        /* if(services == 'others'){
             services  = jQuery( '#service-name-input' ).val();
         }*/

        var otherservices = jQuery('#service-name-input').val();
        var amount = jQuery('#enter-amount').val();
        var currency = jQuery('#currency-type').val();

        if (services == "others" || services == "Others") {
            service = otherservices;
        } else {
            service = services;
        }

        if (firstname == '') {
            jQuery(".fn").css('display', 'block');
        } else {
            jQuery(".fn").css('display', 'none');
        }

        if (lastname == '') {
            jQuery(".ln").css('display', 'block');
        } else {
            jQuery(".ln").css('display', 'none');
        }

        if (emailaddress == '') {
            jQuery(".pay").css('display', 'block');
        } else {
            jQuery(".pay").css('display', 'none');
        }

        if (services == '') {
            jQuery(".sel").css('display', 'block');
        } else {
            jQuery(".sel").css('display', 'none');
        }

        if (amount == '') {
            jQuery(".amo").css('display', 'block');
        } else {
            jQuery(".amo").css('display', 'none');
        }

        if (currency == '') {
            jQuery(".cur").css('display', 'block');
        } else {
            jQuery(".cur").css('display', 'none');
        }

        var regexTest = /^\d+(?:\.\d\d?)?$/;
        var ok = regexTest.test(amount);

        if (firstname == '' || lastname == '' || emailaddress == '' || services == '' || amount == '' || currency == '') {
            return false;
        }

        if (!ok) {
            jQuery('.amo-war').css('display', 'block');
            return false;
        } else {
            jQuery('.amo-war').css('display', 'none');
        }
        var mail = "<?=$paypal_id?>";
        jQuery('.first-name').text(firstname);
        jQuery('.last-name').text(lastname);
        jQuery('.email-address').text(emailaddress);
        jQuery('.service').text(service);
        jQuery('.amount').text(amount);
        jQuery('.currency').text(currency);

        jQuery(".business").val(mail);
        jQuery(".item_name").val(service);
        jQuery(".amount-paypal").val(amount);
        jQuery(".currency_code").val(currency);

        jQuery('.popup-window').css('display', 'block');

    });

    jQuery('.popup-close').click(function () {
        jQuery('.popup-window').css('display', 'none');
    });

    jQuery("#submit-forms").click(function (e) {
        var _services = '';
        var _first_name = $('#first-name').val();
        var _last_name = $('#last-name').val();
        var _email_address = $('#email-address').val();
        var _services_select = $('#services').val();
        var _services_input = $('#service-name-input').val();
        var _enter_amount = $('#enter-amount').val();
        var _currency_type = $('#currency-type').val();

        if (_services_select == "others" || _services_select == "Others" ) {
            _services = _services_input;

        } else {
            _services = _services_select;
        }


        jQuery.ajax({

            url: '<?=url('/ajax');?>',
            type: 'GET',
            data: {
                'first_name': _first_name,
                'last_name': _last_name,
                'email_address': _email_address,
                'services': _services,
                'enter_amount': _enter_amount,
                'currency_type': _currency_type
            },
            success: function (response) {
                console.log(response);
                jQuery('form').attr('action', '<?=$url?>');
                jQuery('form').submit();
            }
        });

    });

    var typingTimer;
    var doneTypingInterval = 100;

    jQuery('#enter-amount').keyup(function () {
        clearTimeout(typingTimer);
        if (jQuery('#enter-amount').val) {
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        }
    });

    function doneTyping() {
        var vale = jQuery('#enter-amount').val();
        var regexTest = /^\d+(?:\.\d\d?)?$/;
        var ok = regexTest.test(vale);

        if (!ok) {
            jQuery('.if-error').addClass('has-error');
            jQuery('.my-warning').css('display', 'block');
        } else {
            jQuery('.if-error').removeClass('has-error');
            jQuery('.my-warning').css('display', 'none');
        }
    }

    jQuery(document).ready(function ($) {
        $("#enter-amount").focusin(function () {
            //$(this).css("background-color", "#FFFFCC");
            //console.log( 'focusin' );
        });
        $("#enter-amount").focusout(function () {
            var val = $(this).val();
            //console.log( addZeroes(val) );
            $(this).val(addZeroes(val));
        });

        $('.otherServices').hide();
    });

    function addZeroes(num) {
        // Cast as number
        var num = Number(num);
        // If not a number, return 0
        if (isNaN(num)) {
            return 0;
        }
        // If there is no decimal, or the decimal is less than 2 digits, toFixed
        if (String(num).split(".").length < 2 || String(num).split(".")[1].length <= 2) {
            num = num.toFixed(2);
        }
        // Return the number
        return num;
    }


    function getNewVal(item) {
        var others = item.value;
        console.log(others);
        if (others.match(/Others.*/) || others.match(/others.*/)) {
            $('.otherServices').show();
            $('#service-name-input').show();
            $('#service-name-input-label').show();

        } else {
            $('.otherServices').hide();
            $('#service-name-input').hide();
            $('#service-name-input-label').hide();
        }

    }

</script>
