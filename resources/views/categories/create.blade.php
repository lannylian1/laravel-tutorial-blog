@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Category</div>

                <div class="card-body">
                    {!! Form::open(['route'=> 'categories.store', 'method'=> 'post']) !!}
                    
                        {{Form::label('category', 'Add category')}}
                        {{Form::text('category', null, ['class'=>'form-control', 'style'=>'', 'id'=>'category' ]) }}
                        {{Form::submit('Add Category', ['class'=>'btn btn-primary btn-lg btn-block', 'style'=>'margin-top:20px'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
