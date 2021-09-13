@extends('front-end.master')
@section('body')
    <div class="banner1">
            <div class="content">
                <h3><a>Home</a> / <a>Checkout</a></h3>
            </div>
    </div>
    <div class="content">
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 well">
                        <h3 class="text-success">If you are not register yet. Please, register first</h3>
                    <br/>
                    <form action="{{ route('customer-registration') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="email@test.com">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control" placeholder="+880xxxxxxxx">
                        </div>
                        <div class="form-group">
                            <textarea name="address"  placeholder="Address..." class="form-control">

                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="btn btn-success btn-block">
                        </div>
                    </form>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5 well">
                        <h3 class="text-success">If you are already register then Login</h3>
                        <h3 class="text-danger">{{ Session::get('message') }}</h3>
                        <br/>
                        <br/>
                        <form action="{{ route('customer-login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="test@gmail.com">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="type your pass..">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
