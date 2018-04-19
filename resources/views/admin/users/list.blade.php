@extends('admin.layouts.master')
@section('title')
    List user
@endsection
@section('breadcrumb')
    List User
@endsection
@section('content')
<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>  
        @foreach ($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>
                    {!!Form::open(['action'=>['UsersControlller@destroy', $user->id]])!!}
                    @if($user->role ==1)
                        {!!Form::button('<i class="fa fa-times"></i>', ['class'=>'btn btn-danger btn-sm disabled', 'type'=>'button'])!!}
                    @else
                    {!!Form::button('<i class="fa fa-times"></i>', ['class'=>'btn btn-danger btn-sm', 'type'=>'submit'])!!}
                    @endif
                    
                    {!!Form::hidden('_method', 'DELETE')!!}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
@endsection