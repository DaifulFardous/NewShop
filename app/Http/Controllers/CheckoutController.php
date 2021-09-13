<?php

namespace App\Http\Controllers;
use App\Order;
use App\Orderdetails;
use App\Payment;
use Cart;
use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use Session;
use Mail;

class CheckoutController extends Controller
{
    public function customerRegistration(Request $request){
        $this->validate($request,[
           'email'=>'email|unique:customers,email'
        ]);
       $customer = new Customer();
       $customer->first_name = $request->first_name;
       $customer->last_name = $request->last_name;
       $customer->email = $request->email;
       $customer->password = bcrypt($request->password);
       $customer->phone_number = $request->phone_number;
       $customer->address = $request->address;
       $customer->save();

       $customerId = $customer->id;
       Session::put('customerId', $customerId);
       Session::put('customerName', $customer->first_name.' '.$customer->last_name );
       $data = $customer->toArray();

       Mail::send('front-end.mails.confirmation-mail',$data, function($message) use ($data){
           $message->to($data['email']);
           $message->subject('confirmation mail');
        });
       return redirect('checkout/shipping');
    }
    public function customerLogin(Request $request){
       $customer = Customer::where('email',$request->email)->first();
       if($customer == NULL){
           return redirect('cart/checkout')->with('message','please enter a valid Email');
       }
       if(password_verify($request->password , $customer->password)){
           Session::put('customerId', $customer->id);
           Session::put('customerName', $customer->first_name.' '.$customer->last_name );
           return redirect('checkout/shipping');
       }else{
          return redirect('cart/checkout')->with('message','please enter a valid password');
       }
    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }
    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }
    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shippingId', $shipping->id);
        return redirect('checkout/payment');
    }
    public function paymentForm(){
        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request){
       $paymentType= $request->payment_type;
       if($paymentType == 'Cash'){
           $order = new Order();
           $order->customer_id = Session::get('customerId');
           $order->shipping_id = Session::get('shippingId');
           $order->order_total = Session::get('orderTotal');
           $order->save();

           $payment = new Payment();
           $payment->order_id = $order->id;
           $payment->payment_type = $paymentType;
           $payment->save();

           $cartProducts = Cart::content();
           foreach ($cartProducts as $cartProduct){
               $orderDetails = new Orderdetails();
               $orderDetails->order_id = $order->id;
               $orderDetails->product_id = $cartProduct->id;
               $orderDetails->product_name = $cartProduct->name;
               $orderDetails->product_price = $cartProduct->price;
               $orderDetails->product_quantity = $cartProduct->qty;
               $orderDetails->save();
           }
           Cart::destroy();
           return redirect('/complete/order');

       }elseif ($paymentType == 'Paypal'){

       }elseif ($paymentType == 'Bkash'){

       }
    }
    public function completeOrder(){
        return 'Thank You Sir for your kind order';
    }
}
