@extends('layouts.admin-master')
@section('body')
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-body">
            <h4 class="text-center text-success" id="xyz">{{ Session::get ('message') }}</h4>
            <table class="table table-bordered" style="margin-top: 70px">
                <tr class="bg-primary text-center">
                    <th>Sl no.</th>
                    <th>Customer Name</th>
                    <th>Order Total</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $order->first_name.' '.$order->last_name }}</td>
                        <td>{{ $order->order_total }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->payment_type }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>
                            <a href="{{ route('view-order-details' ,['id'=>$order->id]) }}" class="btn btn-success btn-xs" title="View Order Details">
                                <span class="glyphicon glyphicon-zoom-in"></span>
                            </a>
                            <a href="{{ route('view-order-invoice',['id'=>$order->id])}}" class="btn btn-warning btn-xs" title="View Order Invoice">
                                <span class="glyphicon glyphicon-zoom-out"></span>
                            </a>
                            <a href="{{ route('download-order-invoice',['id'=>$order->id]) }}" class="btn btn-primary btn-xs" title="Download Order Invoice">
                                <span class="glyphicon glyphicon-download"></span>
                            </a>
                            <a href="" class="btn btn-info btn-xs" title="Edit Order">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="" class="btn btn-danger btn-xs" title="Delete Order">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
