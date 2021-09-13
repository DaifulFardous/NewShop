@extends('front-end.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well">
            <br/>
                Dear {{ Session::get('customerName') }} you have to give us shipping info to complete your order.
            </div>
            <div class="col-md-10 col-md-offset-1 well">
                <h3 class="text-success">Shipping Info</h3>
                <br/>
                <form action="{{ route('new-shipping') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="{{ $customer->first_name.' '.$customer->last_name }}">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="email@test.com" value="{{ $customer->email }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone_number" class="form-control" placeholder="+880xxxxxxxx" value="{{ $customer->phone_number }}">
                    </div>
                    <div class="form-group">
                            <textarea name="address"  placeholder="Address..." class="form-control">
                                {{ $customer->address }}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Shipping Info">
                    </div>
                </form>
        </div>
    </div>
    </div>
@endsection
