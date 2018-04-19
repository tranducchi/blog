@extends('admin.layouts.master')
@section('title')
Add Categories
@endsection
@section('breadcrumb')
Add Categories
@endsection
@section('content')

@if (session('mess'))
    <div class="alert alert-success">
       {{session('mess')}}
    </div>
@endif
    <div class="col-lg-8 offset-2">
           {!!Form::open(['action'=>'CatController@store', 'method'=>'post'])!!}
                {!!Form::label('name', 'Categories Name')!!}
                {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Enter categories name'])!!}
                {!!Form::submit('Create', ['class'=>'btn btn-success mt-3'])!!}
            {!!Form::close()!!}
    </div>
 
@endsection