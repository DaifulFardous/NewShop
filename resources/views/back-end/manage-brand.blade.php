@extends('layouts.admin-master')
@section('body')
    <div class="row">
        <div class="col-md-12>
            <div class="panel panel-default">
        <div class="panel-body">
            <h4 class="text-center text-success" id="xyz">{{ Session::get ('message') }}</h4>
            <table class="table table-bordered">
                <tr class="bg-primary text-center">
                    <th>Sl no.</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                @php($i=1)
                @foreach($Brands as $Brand)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $Brand->brand_name }}</td>
                        <td>{{ $Brand->brand_description }}</td>
                        <td>{{ $Brand->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            @if($Brand->publication_status == 1)
                                <a href="{{ route('unpublish-brand',['id'=>$Brand->id]) }}" class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                            @else
                                <a href="{{ route('publish-brand',['id'=>$Brand->id]) }}" class="btn btn-warning btn-xs">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a>
                            @endif
                            <a href="{{ route('edit-brand',['id'=>$Brand->id]) }}" class="btn btn-success btn-xs">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{ route('delete-brand',['id'=>$Brand->id]) }}" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
