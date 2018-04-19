@extends('admin.layouts.master')
@section('title')
    Add Post
@endsection
@section('breadcrumb')
    New post
@endsection
@section('content')  

    {!!Form::open(['action'=>'PostsController@store', 'method'=>'post', 'enctype'=>'multipart/form-data'])!!}
    {!!Form::label('id_cat', 'Select Categories')!!}
    {!!Form::select('id_cat',$select, 7, ['class'=>'form-control' ])!!}
    {!!Form::label('title', 'The title post')!!}
    {!!Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Enter title the post'])!!}
    {!!Form::label('des', 'Description')!!}
    {!!Form::textarea('des', null, ['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Description'])!!}
    {!!Form::label('content', 'Content the post')!!}
    {!!Form::textarea('content', null, ['id'=>'article-ckeditor'])!!}
    {!!Form::file('img', ['class'=>'mt-2'])!!}
    {!!Form::hidden('id_user',auth()->user()->id)!!}
    {!!Form::submit('Post', ['class'=>'form-control btn btn-success col-lg-2 btn-block m-auto'])!!}
    {!!Form::close()!!}
  
@endsection
@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection