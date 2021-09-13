@extends('layouts.admin-master')
@section('body')
    <div class="row">
        <div class="panel panel-default"  style="margin-top:70px">
            <div class="panel-body">
                <h4 class="text-center text-success" id="xyz">Customer Info For This Order</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Customer Name</th>
                        <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $customer->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default"  style="margin-top:70px">
                <div class="panel-body">
                    <h4 class="text-center text-success" id="xyz">Order Details Info For This Order</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Order no.</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 class="text-center text-success" id="xyz">Shipping Info For This Order</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>{{ $shipping->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $shipping->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Email Address</th>
                            <td>{{ $shipping->email }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $shipping->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-center text-success" id="xyz">Payment Info For This Order</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <td>{{ $payment->payment_type }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $payment->payment_status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 class="text-center text-success" id="xyz">Product Info For This Order</h4>
                            <table class="table table-bordered">
                                <tr class="bg-primary text-center">
                                    <th>Sl no.</th>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                @php($i=1)
                                @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $orderDetail->product_id }}</td>
                                        <td>{{ $orderDetail->product_name }}</td>
                                        <td>Tk.{{ $orderDetail->product_price }}</td>
                                        <td>{{ $orderDetail->product_quantity }}</td>
                                        <td>Tk. {{ $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>

@endsection

