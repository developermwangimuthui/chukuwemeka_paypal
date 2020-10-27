<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order as ModelsOrder;
use App\Models\OrderStatusDescription;
use App\Models\OrderStatusHistory;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\PaypalPayment;
use App\Models\Order;
use Illuminate\Support\Str;
use App\User;
use App\Models\Service;
use App\Settings;

class PaymentController  extends Controller
{
    //

    public function create_payment(Request $request)
    {
        $service_id = $request->input('service-name-select');
        $service = Service::where('id', $service_id)->pluck('service_name')->first();
        $enter_amount = $request->input('enter-amount');
        $currency_type = $request->input('currency-type');
        $firstname = $request->input('first-name');
        $lastname = $request->input('last-name');
        $email = $request->input('email-address');
        $service_name_input = $request->input('service-name-input');

        $paypal_client_id = Settings::pluck('paypal_client_id')->first();
        $paypal_secret = Settings::pluck('paypal_secret')->first();




        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_client_id, // ClientID
                $paypal_secret // ClientSecret
            )
        );
        // $apiContext->setConfig(
        //     array(
        //         'mode' => 'LIVE',
        //         'log.LogEnabled' => true,
        //         'log.FileName' => '../PayPal.log',
        //         'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
        //     )
        // );


        $sku = Str::uuid();


        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        $item1->setName($service)
            ->setCurrency($currency_type)
            ->setQuantity(1)
            ->setSku($sku) // Similar to `item_number` in Classic API
            ->setPrice($enter_amount);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($enter_amount);


        $amount = new Amount();
        $amount->setCurrency($currency_type)
            ->setTotal($enter_amount)
            ->setDetails($details);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://pay.pfamart.com/execute_payment/" . $enter_amount . "/" . $currency_type . "/" . $service_id . "/" . $firstname . "/" . $lastname . "/" . $email . "/" . $service_name_input)
            ->setCancelUrl("http://pay.pfamart.com/cancel_payment");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $payment->create($apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
    }

    public function execute_payment(Request $request, $enter_amount, $currency_type, $service_id, $firstname, $lastname, $email, $service_name_input)
    {



        $our_amount = (int)$enter_amount;
        $paypal_client_id = Settings::pluck('paypal_client_id')->first();
        $paypal_secret = Settings::pluck('paypal_secret')->first();




        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $paypal_client_id, // ClientID
                $paypal_secret // ClientSecret
            )
        );
        // 'AZ56zbDw_EnvPd6C7m3ErZmYHjiXuOWaltIkoCuWVZmqbYHH4-7VOMb49i4cEpJF-3vsEKSmYtFQwZ5x', // ClientID
        // 'ELt1f2cHYS40jzmtP3BB2-k3hb1v6HEE5iN9lIFpNH0l4ki__MWSDkPgo3aBMXXyKoufokVX_At1Yqx5' // ClientSecret


        //   $apiContext->setConfig(
        //                 array(
        //                     'mode' => 'LIVE',
        //                     'log.LogEnabled' => true,
        //                     'log.FileName' => '../PayPal.log',
        //                     'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
        //                 )
        //             );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();


        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($our_amount);

        $amount->setCurrency($currency_type);
        $amount->setTotal($our_amount);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);
        $check_user = User::where('email', $email)->pluck('id')->first();
        // dd($check_user);
        if ($check_user  == null || $check_user == "") {
            echo "User not there";
            $user = new User();
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $email;
            $user->password = Hash::make($firstname);
            if ($user->save()) {
                echo "New user";
                $user_id = $user->id;
                $customer = new Customer();
                $customer->user_id = $user_id;
                if ($customer->save()) {
                    echo "New Customer";
                    $customer_id = $customer->id;
                }
            }
            $order = new Order();
            $order->customer_id = $customer_id;
            $order->service_id = $service_id;
            $order->order_number = rand(1, 10000);
            $order->currency_type = $currency_type;
            $service = Service::where('id', $service_id)->pluck('service_name')->first();
            $order->service_description = $service_name_input;
            $order->amount = $our_amount;
            $order->result = $result;
            if ($order->save()) {

                $order_id = $order->id;
                $orderhistory = new OrderStatusHistory();
                $orderhistory->order_id = $order_id;
                $order_status = OrderStatusDescription::where('orders_status_name', '=', 'Pending')->pluck('id')->first();
                $orderhistory->order_status  = $order_status;
                if ($orderhistory->save()) {



                    $email_message = 'Dear ' . $firstname . ' ' . $lastname . ',<br>You have successfully paid ' . $currency_type . $our_amount . ' We will let you know about your status on ' . $email . ' soon.<br> <br>';
                    $email_subject = 'Product/Service Status';
                    $client_name = $firstname . ' ' . $lastname;


                    $myVar = new AlertController();
                    $mail = $myVar->sendEmail($email, $email_message, $email_subject, $client_name);
                    if ($mail) {


                        return  view('success', compact('firstname', 'lastname', 'our_amount', 'email', 'currency_type'));
                    }
                } else {
                    return $result;
                }
            }
        } else {

            $customer_id = Customer::where('user_id', $check_user)->pluck('id')->first();

            $order = new Order();
            $order->customer_id = $customer_id;
            $order->service_id = $service_id;
            $order->order_number = rand(1, 10000);
            $order->currency_type = $currency_type;
            $service = Service::where('id', $service_id)->pluck('service_name')->first();
            $order->service_description = $service_name_input;
            $order->amount = $our_amount;
            $order->result = $result;
            if ($order->save()) {

                $order_id = $order->id;
                $orderhistory = new OrderStatusHistory();
                $orderhistory->order_id = $order_id;
                $order_status = OrderStatusDescription::where('orders_status_name', '=', 'Pending')->pluck('id')->first();
                $orderhistory->order_status  = $order_status;
                if ($orderhistory->save()) {



                    $email_message = 'Dear ' . $firstname . ' ' . $lastname . ',<br>You have successfully paid ' . $currency_type . $our_amount . ' We will let you know about your status on ' . $email . ' soon.<br> <br>';
                    $email_subject = 'Product/Service Status';
                    $client_name = $firstname . ' ' . $lastname;


                    $myVar = new AlertController();
                    $mail = $myVar->sendEmail($email, $email_message, $email_subject, $client_name);
                    if ($mail) {


                        return  view('success', compact('firstname', 'lastname', 'our_amount', 'email', 'currency_type'));
                    }
                } else {
                    return $result;
                }
            }
        }
    }

    public function cancel_payment()
    {
        return view('cancel');
    }
}
