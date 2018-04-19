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
        <th scope="col">Title</th>
        <th scope="col">Images demo</th>
        <th scope="col">Categories</th>
        <th scope="col">Description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
        <td><img src="storage/images/{{$post->img}}" width="200" alt=""></td>
        <td>{{$post->cat->name}}</td>
        <td>{{$post->des}}</td>
        <td><a href="/post/{{$post->id}}/edit"><i class="fa fa-pencil btn btn-primary btn-sm"></i></a></td> 
        <td> 
            {!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST'])!!}
            {!!Form::hidden('_method', 'DELETE')!!}
            {{ Form::button('<i class="fa fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
            {!!Form::close()!!}
        </td> 
        </tr>
    @endforeach
    
    </tbody>
  </table>
  <div class="row">
        <div class="col-lg-12">
            <div class="paginate float-right">
                <nav aria-label="Page navigation example">
                  {{$posts->links()}}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection