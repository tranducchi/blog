@extends('admin.layouts.master')
@section('title')
    Edit Articles
@endsection
@section('breadcrumb')
    Edit Articles
@endsection
@section('content')  

    {!!Form::open(['action'=>['PostsController@update', $data['posts']['id']],'enctype'=>'multipart/form-data'])!!}
    {!!Form::label('id_cat', 'Select Categories')!!}
    {!!Form::select('id_cat',$data['select'],$data['posts']['id_cat'], ['class'=>'form-control'])!!}
    {!!Form::label('title', 'The title post')!!}
    {!!Form::text('title', $data['posts']['title'], ['class'=>'form-control', 'placeholder'=>'Enter title the post'])!!}
    {!!Form::label('des', 'Description')!!}
    {!!Form::textarea('des',$data['posts']['des'], ['class'=>'form-control', 'rows'=>'5', 'placeholder'=>'Description'])!!}
    {!!Form::label('content', 'Content the post')!!}
    {!!Form::textarea('content', $data['posts']['content'], ['id'=>'article-ckeditor'])!!}
    @if ($data['posts']['img'] != null)
        <img src="/storage/images/{{$data['posts']['img']}}" class="form-control mt-3" alt="" style="width:300px">
    @endif
    
    {!!Form::file('img', ['class'=>'mt-2'])!!}
    {!!Form::hidden('id_user',auth()->user()->id)!!}
    {!!Form::hidden('_method', 'PUT')!!}
    {!!Form::submit('Post', ['class'=>'form-control btn btn-success col-lg-2 btn-block m-auto'])!!}
    {!!Form::close()!!}
  
@endsection
@section('script')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection