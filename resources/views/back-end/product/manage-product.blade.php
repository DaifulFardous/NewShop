@extends('layouts.admin-master')
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
        <div class="panel-body">
            <h4 class="text-center text-success" id="xyz">{{ Session::get ('message') }}</h4>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="bg-primary text-center">
                        <th>Sl no.</th>
                        <th>Category name</th>
                        <th>Brand name</th>
                        <th>Product name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Image</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->brand_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_quantity }}</td>
                            <td>
                                <img src="{{ asset($product->product_image) }}" alt="" height="100px" width="100px">
                            </td>
                            <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                @if($product->publication_status == 1)
                                    <a href="{{ route('unpublish-product',['id'=>$product->id]) }}" class="btn btn-info btn-xs" title="Unpublish">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{ route('publish-product',['id'=>$product->id]) }}" class="btn btn-warning btn-xs"title="Publish">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif
                                    <a href="{{ route('edit-brand',['id'=>$product->id]) }}" class="btn btn-primary btn-xs" title="View Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="Edit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('delete-product',['id'=>$product->id]) }}" class="btn btn-danger btn-xs" title="Delete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
