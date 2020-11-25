@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Item</div>

                <div class="card-body">
                    {!! Form::model($itemForm, ['route'=> ['items.update', $itemForm->id], 'method'=> 'PUT']) !!}
                    
                        {{Form::label('category_id', 'Category ID:')}}
                        {{Form::text('category_id', null, ['class'=>'form-control', 'style'=>'', 'id'=>'category_id' ]) }}

                        {{Form::label('title', 'Title:')}}
                        {{Form::text('title', null, ['class'=>'form-control', 'style'=>'', 'id'=>'title' ]) }}

                        {{Form::label('description', 'Description:')}}
                        {{Form::text('description', null, ['class'=>'form-control', 'style'=>'', 'id'=>'description' ]) }}

                        {{Form::label('price', 'Price:')}}
                        {{Form::text('price', null, ['class'=>'form-control', 'style'=>'', 'id'=>'price' ]) }}

                        {{Form::label('quantity', 'Quantity:')}}
                        {{Form::text('quantity', null, ['class'=>'form-control', 'style'=>'', 'id'=>'quantity' ]) }}

                        {{Form::label('sku', 'SKU:')}}
                        {{Form::text('sku', null, ['class'=>'form-control', 'style'=>'', 'id'=>'sku' ]) }}

                        {{Form::submit('Save', ['class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
