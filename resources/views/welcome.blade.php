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

<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/v3/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Oct 2020 09:26:24 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PFA MART</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="theme/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="theme/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="theme/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    </script>
        <div class="row header">
            <div class="col-md-12">
                <div class="logo">
                    <center>  <a href="https://pay.pfamart.com/">
                        <img src="<?=url('/images/pfa-2.png')?>" height="50" width="100"/>
                    </a></center>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="wpmk-form">
                <p class="form-text-head">
                    Make payment for services via PayPal
                </p>

            <form action="{{route('create_payment')}}" method="POST">
                @csrf
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
                        @foreach ($services  as $service)

                        <option value="{{$service->id}}">{{$service->service_name}}</option>
                        @endforeach

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
                        <input type="submit" name="submit-form" id="submit-form" class="btn btn-primary" value="Pay via PayPal"/>
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
            </form>

            </div>
        </div>

          </div>
          {{-- pop up confirmation --}}




          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="theme/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="theme/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="theme/dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.otherServices').hide();

    });
function getNewVal(item) {
        var selectOption = $( "#services option:selected" ).text();
        console.log(selectOption);
        if (selectOption.match(/Others.*/) || selectOption.match(/others.*/)) {
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
</body>

</html>
