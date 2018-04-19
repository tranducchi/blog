@extends('admin.layouts.master')
@section('title')
    List categories
@endsection
@section('breadcrumb')
    List categories
@endsection
@section('content')
<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>  
        @foreach ($categories as $c)
        
          <tr>
          <th scope="row">{{$c->id}}</th>
            <td>{{$c->name}}</td>
          @if($c->id == 7)
            <td><a href="cat/{{$c->id}}/edit" class="btn btn-primary btn-sm disabled"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
            <td>
             
                {!!Form::open(['action'=>['CatController@destroy',$c->id]])!!}
                {!!Form::button('<i class="fa fa-times" aria-hidden="true"></i>', ['class'=>'btn btn-danger btn-sm disabled'])!!}
                {!!Form::hidden('_method', 'DELETE')!!}
                {!!Form::close()!!}
          @else
          <td><a href="cat/{{$c->id}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
          <td>
           
              {!!Form::open(['action'=>['CatController@destroy',$c->id]])!!}
              {!!Form::button('<i class="fa fa-times" aria-hidden="true"></i>', ['type'=>'submit','class'=>'btn btn-danger btn-sm'])!!}
              {!!Form::hidden('_method', 'DELETE')!!}
              {!!Form::close()!!}
          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
@endsection