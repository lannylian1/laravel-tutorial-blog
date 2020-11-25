@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Item</div>

                <div class="card-body">
                    {!! Form::open(['route'=> 'items.store', 'method'=> 'post', 'files'=>true]) !!}
                    
                        {{Form::label('category_id', 'Add Category ID')}}
                        {{Form::text('category_id', null, ['class'=>'form-control', 'style'=>'', 'id'=>'category_id' ]) }}

                        {{Form::label('title', 'Add Title')}}
                        {{Form::text('title', null, ['class'=>'form-control', 'style'=>'', 'id'=>'title' ]) }}

                        {{Form::label('description', 'Add Description')}}
                        {{Form::text('description', null, ['class'=>'form-control', 'style'=>'', 'id'=>'description' ]) }}

                        {{Form::label('price', 'Add Price')}}
                        {{Form::text('price', null, ['class'=>'form-control', 'style'=>'', 'id'=>'price' ]) }}

                        {{Form::label('quantity', 'Add Quantity')}}
                        {{Form::text('quantity', null, ['class'=>'form-control', 'style'=>'', 'id'=>'quantity' ]) }}

                        {{Form::label('sku', 'Add SKU')}}
                        {{Form::text('sku', null, ['class'=>'form-control', 'style'=>'', 'id'=>'sku' ]) }}

                        {{Form::label('featured_image', 'Upload Image:')}}
                        {{Form::file('featured_image')}}

                        {{Form::submit('Add', ['class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
