@extends('front-end.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well">
                <br/>
                Dear {{ Session::get('customerName') }} you have to give us product payment details
            </div>
            <div class="col-md-10 col-md-offset-1 well">
               <h1>Payment Form</h1>
                <form action="{{ route('new-order') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-bordered">
                        <tr>
                            <td>Cash on delivery</td>
                            <td><input type="radio" name="payment_type" value="Cash">Cash On Delivery</td>
                        </tr>
                        <tr>
                            <td>Paypal</td>
                            <td><input type="radio" name="payment_type" value="Paypal">Paypal</td>
                        </tr>
                        <tr>
                            <td>Bkash</td>
                            <td><input type="radio" name="payment_type" value="Bkash">Bkash</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="btn" value="Confirm Order"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection

