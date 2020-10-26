


<style>

    body{
        background-color: #f5f7fa;
        font-family: PayPal-Sans-Big,Helvetica Neue,Arial,sans-serif;
    }
    input, select{
        border-radius: 10px !important;
    }
    .header{
        text-align: left;
        padding: 10px;
        background-color: #FFFFFF;
        border-bottom: 1px solid #EDEDED;
        box-sizing: border-box;
        box-shadow: 0px -10px 10px 10px;
        position: fixed;
        width: 100%;
        z-index: 99999;
    }
    .header .logo{
        text-align: left;
    }
    .header .logo img{

    }
    .form-worning{
        font-weight: bold;
        color: red;
        display: none;
    }
    .menu{
        margin-top: 25px;
        float: right;
    }
    .menu ul{
        margin: 0px;
        padding: 0px;
    }
    .menu ul li{
        list-style-type: none;
        display: inline-block;
    }
    .menu ul li a{
        padding: 10px;
        color: #000000;
        text-decoration: none;
        font-weight: bold;
        transition: 1s;
    }
    .menu ul li a:hover{
        color: rgba(0,0,0,.6);
    }
    .wpmk-form{
        width: 50%;
        margin: auto;
        margin-top: 85px;
        box-sizing: border-box;
        padding: 15px;
        border: 1px solid #EDEDED;
        box-shadow: 0px 0px 10px 5px #EDEDED;
        margin-bottom: 20px;
        overflow: hidden;
        background-color: #FFFFFF;
        border-radius: 5px;
    }
    .wpmk-form form{
        overflow: hidden;
        margin-bottom: 50px;
    }
    .wpmk-form .checkbox label{
        padding-left: 0px;
    }
    .amount-wrap,
    .footer-wrap{
        width: 50%;
        float: left;
        box-sizing: border-box;
        padding-right: 10px;
    }
    .footer-wrap{
        text-align: left;
    }
    .footer-wrap img {
        width: 50%;
    }

    .amount-wrap select,
    .amount-wrap input{
        width: 100%;
    }
    .wpmk-form .checkbox{
        float: left;
        width: 100%;
    }
    #other-wrap{
        display: none;
    }
    .mubeen-submit{
        text-align: right;
        width: 200px;
        float: right;
        margin-top: 25px;
    }
    .mubeen-submit input{
        padding: 10px;
        font-size: 20px;
        border-radius: 5px !important;
    }
    .my-warning{
        width: 100%;
        display: none;
    }

    .popup-window{
        position: fixed;
        top: 72px;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 25px;
        height: 100%;
        display: none;
    }
    .popup-window .popup-close{
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
    .popup-window .popup-content{
        background-color: #FFFFFF;
        padding: 20px 12px;
        font-size: 12px;
        position: relative;
        overflow: hidden;
    }
    .popup-window .popup-content p{
        text-align: center;
        color: #002d8a;
        font-size: 15px;
    }
    .btn-paypal{
        color: #fff;
        background-color: #002d8a;
        border-color: #002d8a;
    }
    .btn-paypal:hover{
        color: #fff !important;
    }
    p.form-text-head{
        font-family: PayPal-Sans-Big,Helvetica Neue,Arial,sans-serif;
        text-align: center;
        margin-bottom: 25px;
        font-size: 25px;
        padding-left: 50px;
        padding-right: 50px;
        /*text-transform: capitalize;*/
    }
    .form-footer{
        border-top: 2px dotted #cbd2d6;
        margin-top: 20px;
    }
    .copy-right-text{
        font-family: PayPal-Sans-Big,Helvetica Neue,Arial,sans-serif;
        margin-top: 10px;
        text-align: center;
    }
    .footer-links{
        font-family: PayPal-Sans-Big,Helvetica Neue,Arial,sans-serif;
        margin-top: 10px;
        text-align: center;
    }
    .footer-links ul{
        margin: 0px;
        padding: 0px;
    }
    .footer-links ul li{
        list-style-type: none;
        display: inline-block;
        margin-right: 5px;
    }
    .footer-links ul li a{
        color: #333;
        text-decoration: none;
        font-family: PayPal-Sans-Big,Helvetica Neue,Arial,sans-serif;
    }
    .footer-links ul li a:hover{
        color: #000;
    }
    @media (max-width: 426px){
        .wpmk-form{
            width: 100%;
        }
        .amount-wrap{
            width: 100%;
        }
        .menu{
            display: none;
        }
        .amount-wrap,
        .footer-wrap {
            padding-right: 0px;
        }
        .header {
            text-align: center;
        }
        .footer-wrap img{
            width: 70%;
        }
        .footer-wrap{
            text-align: center;
        }
        .copy-right-text{
            margin-top: 20px;
        }
    }
</style>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="mubeenkhan" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="//db.onlinewebfonts.com/c/44994582bcefd02119158ff8b0d16b75?family=PayPal+Sans+Big" rel="stylesheet" type="text/css"/>
    <title>PayPal Form | PFA</title>

</head>
<?php

use Illuminate\Support\Facades\Session;?>
<body>
<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12">
            <div class="logo">
                <a href="https://pfaccounts.com/">
                    <img src="<?= url('/images/front_logo/pfa-2.png')?>" height="50" width="100"/>
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


            <h3>Dear <b>{{$firstname."  ".$lastname}}</b>, <br> You have successfuly paid <b>{{$our_amount."  ". $currency_type}}</b>. We will let you know about your status on  {{$email}} soon.</h3>
        <br>
        <a href="/">Go Back</a>



        </p>

    </div>



</body>
</html>

