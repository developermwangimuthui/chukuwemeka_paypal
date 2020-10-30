<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         $this->middleware('permission:dashboard', ['only' => ['index']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {




        $orders_count = Order::count();
        // $orders_count = Order::join('order_status_histories','orders.id','=','order_status_histories.order_id')
        // ->join('order_status_descriptions','order_status_descriptions.id','=','order_status_histories.order_status')
        // ->where('order_status_descriptions.orders_status_name','=','Pending')
        // ->groupBy('orders.id')
        // ->count();

        $customers_count = Customer::count();


        $orders = Order::join('customers','customers.id','=','orders.customer_id')
        ->join('order_status_histories','orders.id','=','order_status_histories.order_id')
        ->join('order_status_descriptions','order_status_descriptions.id','=','order_status_histories.order_status')
        ->join('services','services.id','=','orders.service_id')->join('users','users.id','=','customers.user_id')
        ->select([

            'orders.id as id',
            'service_description as service_description',
            'service_name as service_name',
            'first_name',
            'last_name',
            'email',
            'amount',
            'converted_amount',
            'orders.updated_at as date_created',
            'orders_status_name',
            'order_status_histories.updated_at as history'

        ])

        ->orderBy('history','DESC')

        ->groupBy('orders.id')
        ->get();
        $services_count = Service::count();
        $services = Service::orderBy('created_at','DESC')->get();



        return view('home',compact('orders','services','orders_count','services_count','customers_count'));
    }
}
