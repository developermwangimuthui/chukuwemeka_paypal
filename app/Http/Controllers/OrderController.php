<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use App\Models\OrderStatusDescription;
use App\Models\OrderStatusHistory;
use App\User;
use Illuminate\Http\Request;
use DB;

use Barryvdh\DomPDF\Facade as PDF;
use OrderStatusDescription as GlobalOrderStatusDescription;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_status_histories', 'orders.id', '=', 'order_status_histories.order_id')
            ->join('order_status_descriptions', 'order_status_descriptions.id', '=', 'order_status_histories.order_status')
            ->join('services', 'services.id', '=', 'orders.service_id')->join('users', 'users.id', '=', 'customers.user_id')
            ->select([

                'orders.id as id',
                'service_description as service_description',
                'service_name as service_name',
                'first_name',
                'last_name',
                'email',
                'amount',
                'orders.updated_at as date_created',
                'orders_status_name',
                'order_status_histories.updated_at as history'

            ])

            ->orderBy('history', 'DESC')

            ->groupBy('orders.id')
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_status_update(Request $request, $id)
    {

        $order_status_histories = new OrderStatusHistory();
        $order_status_histories->order_id = $id;
        $order_status_histories->order_status  = $request->input('status');
        $order_status_histories->comments  = $request->input('comments');

        $data = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('users', 'users.id', '=', 'customers.user_id')
            ->where('orders.id', $id)->get();
        if ($order_status_histories->save()) {
            $status = OrderStatusDescription::where('id', $request->input('status'))->pluck('orders_status_name')->first();

            $email_message = 'Dear ' . $data[0]->first_name. "" . $data[0]->last_name. ',<br> Your order status is now marked as ' . $status . '.<br>';
            $email_subject = 'Product/Service Status';
            $client_name = $data[0]->first_name. ' ' .$data[0]->last_name;

            $myVar = new AlertController();
            $mail = $myVar->sendEmail($data[0]->email, $email_message, $email_subject, $client_name);
            if($mail){

            return redirect()->back()->with(['success' => 'Order Updated succesfully']);
            }
        } else {
            return redirect()->back()->with(['error' => 'Order not updated ']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {

        $service_reports = Service::join('orders', 'services.id', '=', 'orders.service_id')
            ->select([
                'service_name',
                DB::raw("SUM(orders.amount) as amount"),

            ])->groupBy('services.id')
            ->get();
        return  view('reports.orders', compact('service_reports'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, $id)
    {

        $orders = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_status_histories', 'orders.id', '=', 'order_status_histories.order_id')
            ->join('order_status_descriptions', 'order_status_descriptions.id', '=', 'order_status_histories.order_status')
            ->join('services', 'services.id', '=', 'orders.service_id')->join('users', 'users.id', '=', 'customers.user_id')
            ->select([

                'orders.id as id',
                'service_description as service_description',
                'service_name as service_name',
                'first_name',
                'last_name',
                'currency_type',
                'email',
                'comments',
                'amount',
                'orders.updated_at as date_created',
                'orders_status_name',
                'order_number'

            ])
            ->where('orders.id', $id)
            ->groupBy('orders.id')
            ->get();
        $order_status_histories = OrderStatusHistory::join('order_status_descriptions', 'order_status_descriptions.id', '=', 'order_status_histories.order_status')->where('order_status_histories.order_id', $id)
            ->select([

                'order_status',
                'comments',
                'orders_status_name',
                'order_status_histories.updated_at as date_created',
            ])
            ->orderBy('order_status_histories.updated_at', 'DESC')
            ->get();
        $order_statuses = OrderStatusDescription::all();

        return view('orders.show', compact('orders', 'order_statuses', 'order_status_histories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function downloadPdf($id)
    {

        $orders = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_status_histories', 'orders.id', '=', 'order_status_histories.order_id')
            ->join('order_status_descriptions', 'order_status_descriptions.id', '=', 'order_status_histories.order_status')
            ->join('services', 'services.id', '=', 'orders.service_id')->join('users', 'users.id', '=', 'customers.user_id')
            ->select([

                'orders.id as id',
                'service_description as service_description',
                'service_name as service_name',
                'first_name',
                'last_name',
                'currency_type',
                'email',
                'comments',
                'order_number',
                'amount',
                'orders.updated_at as date_created',
                'orders_status_name'

            ])
            ->where('orders.id', $id)
            ->groupBy('orders.id')
            ->get();
           $name= $orders[0]->order_number;
        $pdf = PDF::loadView('orders.pdf', compact('orders'));

        return $pdf->download("Invoice_".$name.".pdf");
    }
}
