@extends('layouts.admin-master')
@section('body')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Product Form</h4>
                </div>
                <div class="panel-body">
                    <h4 class="text-success text-center">{{ Session::get('message') }}</h4>
                    <form action="{{ route('update-product') }}" method="post" class="form-horizontal" enctype="multipart/form-data" name="editProductForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-4"> Category Name </label>
                            <div class="form-group col-md-8">
                                <select class="form-control" name="category_id">
                                    <option>-----Select Category---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-warning">{{ $errors->has('category_id') ? $errors->first('category_id') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Brand Name </label>
                            <div class="form-group col-md-8">
                                <select class="form-control" name="brand_id">
                                    <option>-----Select brand---</option>
                                    @foreach($Brands as $Brand)
                                        <option value="{{ $Brand->id }}">{{ $Brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-warning">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Name </label>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                                <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                                <span class="text-warning">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Price </label>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" name="product_price" value="{{ $product->product_price }}">
                                <span class="text-warning">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Quantity </label>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" name="product_quantity" value="{{ $product->product_quantity }}">
                                <span class="text-warning">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Short Description </label>
                            <div class="form-group col-md-8">
                               <textarea class="form-control" name="short_description">
                                   {{ $product->short_description }}
                               </textarea>
                                <span class="text-warning">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Long Description </label>
                            <div class="form-group col-md-8">
                               <textarea class="form-control" name="long_description" id="editor">
                                   {{ $product->long_description }}
                               </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Image </label>
                            <div class="form-group col-md-8">
                                <input type="file" class="form-control" name="product_image" accept="image/*">
                                <br/>
                                <img src="{{ asset(($product->product_image)) }}" alt="" height="80" width="80">
                                <span class="text-warning">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Publication Status </label>
                            <div class="col-sm-8">
                                <input type="radio" checked name="publication_status" {{ $product->publication_status == 1 ? 'checked' : ''}} value="1">Published
                                <input type="radio" name="publication_status"   {{ $product->publication_status == 0 ? 'checked' : ''}} value="0">Unpublished
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Product Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editProductForm'].elements['category_id'].value='{{ $product->category_id }}';
        document.forms['editProductForm'].elements['brand_id'].value='{{ $product->brand_id }}';
    </script>
@endsection

