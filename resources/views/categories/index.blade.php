@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @php
                        //dd($categories);
                    @endphp
                    <h1 class="pull-right"><a href='/categories/create' class='btn btn-info' role='button'>+ Add New Category</a></h1>
                    <table class="table">
                        <thead>
                            <th>#</td>
                            <th>Category</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->category}}</td>
                                    <td>
                                        <div style="float:left"><a href="{{route('categories.edit',$category->id)}}" class='btn btn-success btn-sm'>Edit</a></div>
                                        <div style="float:left;margin-left:5px">
                                            {!!Form::open(['route'=>['categories.destroy', $category->id], 
                                                            'method'=>'DELETE', 'onsubmit'=>'return confirm("Delete Category? Are you sure?")'])!!}
                                                {{Form::submit('Delete',['class'=>'btn btn-sm btn-danger'])}}
                                            {!!Form::close()!!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
