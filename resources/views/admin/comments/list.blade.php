@extends('admin.layouts.master')
@section('title')
    List post
@endsection
@section('breadcrumb')
   List Post 
@endsection
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Comment Content</th>
        <th scope="col">In the post</th>
        <th scope="col">User Comment</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>  
      @foreach ($comments as $cm)
     <tr>
      
     <td>{{$cm->id}}</td>
     <td>{{$cm->comment_text}}</td>
     <td>{{$cm->posts->title}}</td>
     <td>{{$cm->user->name}}</td>
            <th>
                {!!Form::open(['action'=>['CommentsController@destroy',$cm->id]])!!}
                {!!Form::button('<i class="fa fa-times" aria-hidden="true"></i>',['class'=>'btn btn-danger', 'type'=>'submit'])!!}
                {!!Form::hidden('_method', 'DELETE')!!}
                {!!Form::close()!!}
            </th>
       
         
     </tr>  
      @endforeach
    </tbody>
  </table>
@endsection