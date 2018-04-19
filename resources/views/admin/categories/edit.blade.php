@extends('admin.layouts.master')
@section('title')
   Edit categories 
@endsection
@section('breadcrumb')
    Update categories
@endsection
@section('content')
    <div class="col-lg-8 offset-2">
        {!!Form::open(['action'=>['CatController@update', $cat->id]])!!}
        {!!Form::label('email', 'Categories Name', ['class' => 'awesome']);!!}
        {!!Form::text('name',$cat->name, ['class'=>'form-control'])!!}
        {!!Form::hidden('_method','PATCH')!!}
        {!!Form::submit('Update', ['class'=>'btn btn-success mt-3'])!!}
        {!!Form::close()!!}
    </div>
@endsection