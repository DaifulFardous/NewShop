@extends('front-end.master')
@section('body')
   <div class="banner1">
       <div class="container">
           <h3><a href="#">Home</a> / <span>Add To Cart</span></h3>
       </div>
   </div>
    <div class="content">
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <h3 class="text-center text-success">My Shopping Cart</h3>
                    </div>
                    <hr/>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @php($i = 1)
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartProduct->name }}</td>
                                <td><img src="{{ asset($cartProduct->options->image) }}" alt="" height="50" width="50"></td>
                                <td>{{ $cartProduct->price }}</td>
                                <td>
                                    <form action="{{ route('update-cart') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1">
                                        <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                        <input type="submit" name="btn" value="Update">
                                    </form>
                                </td>
                                <td>{{ $total = $cartProduct->price*$cartProduct->qty}}</td>
                                <td>
                                    <a href="{{ route('delete-cart-item' , ['rowId'=>$cartProduct->rowId]) }}" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $sum= $sum+$total?>
                        @endforeach
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Item Total= </th>
                            <th>{{ $sum }}</th>
                        </tr>
                        <tr>
                            <th>Vat Total= </th>
                            <th>{{ $vat = 0 }}</th>
                        </tr>
                        <tr>
                            <th>Grand Total= </th>
                            <th>{{ $orderTotal = $sum + $vat }}</th>
                            <?php
                                Session::put('orderTotal', $orderTotal);
                            ?>
                        </tr>
                    </table>
                    @if(Session::get('customerId') && Session::get('shippingId'))
                       <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout</a>
                    @elseif(Session::get('customerId'))
                        <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout</a>
                    @else
                        <a href="{{ route('checkout-cart') }}" class="btn btn-success pull-right">Checkout</a>
                    @endif
                       <a href="" class="btn btn-success">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

