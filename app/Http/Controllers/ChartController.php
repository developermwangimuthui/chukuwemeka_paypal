<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use DB;
use App\Models\OrderStatusHistory;
use App\Models\OrderStatusDescription;

class ChartController extends Controller
{

    public function getMonths()
    {
        $months = [];
        $orderMonths = OrderStatusHistory::orderBy('created_at', 'ASC')->pluck('created_at');
        $orderMonths = json_decode($orderMonths);
        if (!empty($orderMonths)) {
            foreach ($orderMonths as $unformatted_date) {
                $date = $unformatted_date;
                $date = new \DateTime($date);
                $month_no = $date->format('m');
                $month_Name = $date->format('M');
                $months[$month_no] = $month_Name;
            }
            # code...
            // dd($months);
        }
        return $months;
    }

    public function getMonthlyCompletedOrdersCount($month)
    {
        $orders_status_id = OrderStatusDescription::where('orders_status_name', '=', 'Completed')->pluck('id')->first();
        $completedOrders = OrderStatusHistory::whereMonth('created_at', $month)->where('order_status', '=', $orders_status_id)->count();
        return $completedOrders;
    }
    public function getMonthlyCancelledOrdersCount($month)
    {

        $orders_status_id = OrderStatusDescription::where('orders_status_name', '=', 'Cancel')->pluck('id')->first();
        $completedOrders = OrderStatusHistory::whereMonth('created_at', $month)->where('order_status', '=', $orders_status_id)->count();
        return $completedOrders;
    }
    public function getMonthlyReturnOrdersCount($month)
    {

        $orders_status_id = OrderStatusDescription::where('orders_status_name', '=', 'Return')->pluck('id')->first();
        $completedOrders = OrderStatusHistory::whereMonth('created_at', $month)->where('order_status', '=', $orders_status_id)->count();
        return $completedOrders;
    }
    public function getMonthlyPengingOrdersCount($month)
    {

        $orders_status_id = OrderStatusDescription::where('orders_status_name', '=', 'Pending')->pluck('id')->first();
        $completedOrders = OrderStatusHistory::whereMonth('created_at', $month)->where('order_status', '=', $orders_status_id)->count();
        return $completedOrders;
    }

    public function getMonthlyOrdersData()
    {
        $monthlyCompletedOrderData = [];
        $monthlyPendingOrderData = [];
        $monthlyReturnOrderData = [];
        $monthlyCancelledOrderData = [];
        $finalDataArray = [];
        $month_NameArray = [];
        $months = $this->getMonths();
        if (!empty($months)) {
            foreach ($months as $month_no => $month_Name) {
                $monthlycompletedOrders = $this->getMonthlyCompletedOrdersCount($month_no);
                $monthlyreturnedOrders = $this->getMonthlyReturnOrdersCount($month_no);
                $monthlycancelledOrders = $this->getMonthlyCancelledOrdersCount($month_no);
                $monthlypendingOrders = $this->getMonthlyPengingOrdersCount($month_no);
                array_push($monthlyCompletedOrderData, $monthlycompletedOrders);
                array_push($monthlyReturnOrderData, $monthlyreturnedOrders);
                array_push($monthlyCancelledOrderData, $monthlycancelledOrders);
                array_push($monthlyPendingOrderData, $monthlypendingOrders);
                array_push($month_NameArray, $month_Name);
            }
        }
        $month_array = $this->getMonths();
        $max_completed = max($monthlyCompletedOrderData);
        $max_completed = round(($max_completed + 10 / 2) / 10) * 10;
        // dd($max_completed);
        $finalDataArray = [
            'months' => $month_NameArray,
            'completed_orders_count' => $monthlyCompletedOrderData,
            'cancelled_orders_count' => $monthlyCancelledOrderData,
            'returned_orders_count' => $monthlyReturnOrderData,
            'pending_orders_count' => $monthlyPendingOrderData,
            'max' => $max_completed,
        ];

        return $finalDataArray;
    }
}
