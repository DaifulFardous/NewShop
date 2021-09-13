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
                    <form action="{{ route('new-product') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                              <input type="text" class="form-control" name="product_name">
                                <span class="text-warning">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Price </label>
                            <div class="form-group col-md-8">
                              <input type="text" class="form-control" name="product_price">
                                <span class="text-warning">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Quantity </label>
                            <div class="form-group col-md-8">
                              <input type="text" class="form-control" name="product_quantity">
                                <span class="text-warning">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Short Description </label>
                            <div class="form-group col-md-8">
                               <textarea class="form-control" name="short_description">

                               </textarea>
                                <span class="text-warning">{{ $errors->has('short_description') ? $errors->first('short_description') : ' ' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4">Long Description </label>
                            <div class="form-group col-md-8">
                               <textarea class="form-control" name="long_description" id="editor">

                               </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Product Image </label>
                            <div class="form-group col-md-8">
                                <input type="file" class="form-control" name="product_image" accept="image/*">
                                <span class="text-warning">{{ $errors->has('product_image') ? $errors->first('product_image') : ' ' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"> Publication Status </label>
                            <div class="col-sm-8">
                                <input type="radio" checked name="publication_status"  value="1">Published
                                <input type="radio" name="publication_status"  value="0">Unpublished
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

