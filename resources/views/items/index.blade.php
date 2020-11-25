@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Items</div>

                <div class="card-body">
                    @php
                        //dd($items);
                    @endphp
                    <h1 class="pull-right"><a href='/items/create' class='btn btn-info' role='button'>+ Add New Item</a></h1>
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Category ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>SKU</th>
                            <th>Image</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category_id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->sku}}</td>
                                    <td>{{$item->image}}</td>
                                    <td>
                                        <div style="float:left"><a href="{{route('items.edit',$item->id)}}" class='btn btn-success btn-sm'>Edit</a></div>
                                        <div style="float:left">
                                            {!!Form::open(['route'=>['items.destroy', $item->id], 
                                                            'method'=>'DELETE', 'onsubmit'=>'return confirm("Delete Item? Are you sure?")'])!!}
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
