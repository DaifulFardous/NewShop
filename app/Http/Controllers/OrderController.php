<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Orderdetails;
use App\Payment;
use App\Shipping;
use App\Order;
use Illuminate\Http\Request;
use DB;
use PDF;

class OrderController extends Controller
{
    public function manageOrder(){
           $orders = DB::table('orders')
                ->join('customers','orders.customer_id', '=', 'customers.id')
                ->join('payments','orders.id', '=', 'payments.order_id')
                ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
                ->get();

        return view('back-end.order.manage-order',['orders'=>$orders]);
    }
    public function viewOrder($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id',$order->id)->first();
        $orderDetails = Orderdetails::where('order_id',$order->id)->get();
        return view('back-end.order.view-order',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
        ]);
    }
    public function viewInvoice($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $orderDetails = Orderdetails::where('order_id',$order->id)->get();
        return view('back-end.order.view-order-invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'orderDetails'=>$orderDetails,
        ]);
    }
    public function downloadInvoice($id){
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $orderDetails = Orderdetails::where('order_id',$order->id)->get();

        $pdf = PDF::loadView('back-end.order.download-invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'orderDetails'=>$orderDetails
        ]);
        return $pdf->stream('invoice.pdf');

    }
}
