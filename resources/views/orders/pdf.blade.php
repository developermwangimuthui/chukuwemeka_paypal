<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Premium Freelancing Accounts</title>

    <style>
        #customers {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        #infor {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        #top {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 30px;
            /*border: 1px solid #eee;*/
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }

        #customers td, #customers th {
            /*border: 1px solid #ddd;*/
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #fff;
        }


        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #0a0c0d;
            color: white;
        }

        #customers tr td:nth-child(1) {
            width: 53%;
        }
        .me{

            border-top: 2px solid #eeeeee;
        } .total{

            border-top: 2px solid #000000;
            border-bottom:  2px solid #000000;
        }
    </style>
</head>

<body>
    <table cellpadding="0" cellspacing="0">

@foreach ($orders as $order)

        <table id="top" style=" border-collapse:separate; border-spacing:1em;">
            <tr style=" padding: 5px;">
                <td style="width: 53%;text-align: left" >
                    <img src="https://pfaccounts.com/wp-content/uploads/2019/10/pfa-2.png"
                         style="width:100%; max-width:150px;align:left;"></td>
                <td colspan="2"><strong>Premium Freelancing Accounts</strong>
                    <br>
                    Beedstrasse 54 <br>
                    40468 Düsseldorf <br>
                    Germany<br></td>

            </tr>
            <tr >
                <td style="width:53%;"><span style="font-weight: bolder;font-size:30px">INVOICE</span><br><br>
                    {{$order->first_name." ".$order->last_name }}<br>
                    {{$order->email }}</td>
                <td colspan="2">Order Number #:
                    &nbsp;&nbsp; {{'PF'.$order->order_number }}<br>
                    Order Date:&nbsp;&nbsp; {{ date('F j, Y', strtotime($order->date_created)) }}<br>
                    Payment Method:&nbsp;&nbsp;Paypal</td>

            </tr>
            <tr>

                <table id="customers">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                        <td> @if ($order->service_description == null ||$order->service_description =='')
                            {{$order->service_name}}
                        @else
                            {{$order->service_description}}
                        @endif</td>
                        <td>1</td>
                        <td>@if($order->currency_type == 'USD')
                                $
                            @endif
                            @if($order->currency_type == 'EUR')
                                €
                            @endif
                            @if($order->currency_type == 'GBP')
                                £
                            @endif
                            {{ $order->amount }}</td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="me"> <strong>Subtotal</strong></td>
                        <td class="me">@if($order->currency_type == 'USD')
                                $
                            @endif
                            @if($order->currency_type == 'EUR')
                                €
                            @endif
                            @if($order->currency_type == 'GBP')
                                £
                            @endif
                            {{$order->amount }}
                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="me"> <strong>Tax</strong></td>
                        <td class="me">@if($order->currency_type == 'USD')
                                $
                            @endif
                            @if($order->currency_type == 'EUR')
                                €
                            @endif
                            @if($order->currency_type == 'GBP')
                                £
                            @endif
                            0
                        </td>
                    </tr>
                    <tr >
                        <td></td>
                        <td class="total"> <strong>Total</strong></td>
                        <td class="total"> <strong>
                            @if($order->currency_type == 'USD')
                                $
                            @endif
                            @if($order->currency_type == 'EUR')
                                €
                            @endif
                            @if($order->currency_type == 'GBP')
                                £
                            @endif
                            {{$order->amount }}</strong>
                        </td>
                    </tr>

                </table>
            </tr>
        </table>

    </table>

@endforeach

</body>
</html>
