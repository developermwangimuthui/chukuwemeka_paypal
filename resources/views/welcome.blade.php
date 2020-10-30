
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
  <link rel="stylesheet" href="css/custom.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="theme/code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="theme/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="theme/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">

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

            <form action="{{route('create_payment')}}" method="POST" id="paypal_form">
                @csrf
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" id="first-name" name="first-name" class="form-control" placeholder="First Name"
                           required="required"/>
                    <div class="form-worning fn">Please enter your first name</div>
                </div>

                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" id="last-name" name="last-name" class="form-control" placeholder="Last Name"
                           required="required"/>
                    <div class="form-worning ln">Please enter your last name</div>
                </div>

                <div class="form-group">
                    <label for="email-address">Paypal Email Address</label>
                    <input type="email" id="email-address" name="email-address" class="form-control"
                           placeholder="example@example.com" required="required"/>
                    <div class="form-worning pay">Please enter your paypal email</div>
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
                    <div class="form-worning sel">Select a service</div>
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
                        <div class="form-worning amo">Please enter the amount you want to pay</div>
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
                        <div class="form-worning cur">Select one currency</div>
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
                         <button type="submit" name="submit-form" id="submit-form" class="btn btn-block btn-outline-primary btn-lg"
                        >Pay via PayPal</button>
                    </div>
                </div>

                <div style="clear: both;"></div>
                <div class="my-footer">

                        &copy; 2019 - <?php echo date('Y'); ?> PFA ®. All rights reserved.|
                                <a href="https://pfaccounts.com/#About_sec" target="_blank">About</a>
                               <a href="https://pfaccounts.com/#Contact_sec" target="_blank">Contact</a>
                             <a href="https://pfaccounts.com/#" target="_blank">Privacy</a>
                                <a href="https://pfaccounts.com/#Key_sec" target="_blank">Services</a>
                            </ul>
</div>

            </form>

            </div>

        </div>
          </div>
          {{-- pop up confirmation --}}

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

                <button type="submit" name="submit-form" id="final_submit" class="btn btn-block btn-outline-primary btn-lg"
                       >Pay via PayPal</button>
       </div>
</div>


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
                if (selectOption.match(/Other.*/) || selectOption.match(/other.*/)) {
                    $('.otherServices').show();
                    $('#service-name-input').show();
                    $('#service-name-input-label').show();


                } else {
                    $('.otherServices').hide();
                    $('#service-name-input').hide();
                    $('#service-name-input-label').hide();

                }

            }

    jQuery('.popup-close').click(function () {
        jQuery('.popup-window').css('display', 'none');
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
                    // $(this).css("background-color", "#FFFFCC");
                    // console.log( 'focusin' );
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




            jQuery("#final_submit").click(function (event) {
            event.preventDefault();

                console.log('final');

            $("#paypal_form")[0].submit();
            });

            jQuery("#submit-form").click(function (event) {

            event.preventDefault();
                var firstname = jQuery('#first-name').val();
                var lastname = jQuery('#last-name').val();
                var emailaddress = jQuery('#email-address').val();
                var services = jQuery('#services').text();

                /* if(services == 'others'){
                    services  = jQuery( '#service-name-input' ).val();
                }*/

                var otherservices = jQuery('#service-name-input').val();
                var amount = jQuery('#enter-amount').val();
                var currency = jQuery('#currency-type').val();

                var services = $( "#services option:selected" ).text();
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
                var mail = "";
                jQuery('.first-name').text(firstname);
                jQuery('.last-name').text(lastname);
                jQuery('.email-address').text(emailaddress);
                jQuery('.service').text(service);
                jQuery('.amount').text(amount);
                jQuery('.currency').text(currency);

                jQuery(".item_name").val(service);
                jQuery(".amount-paypal").val(amount);
                jQuery(".currency_code").val(currency);

                jQuery('.popup-window').css('display', 'block');

            });

</script>
</body>

</html>
