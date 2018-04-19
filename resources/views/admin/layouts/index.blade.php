@extends('admin.layouts.master')
@section('content')
	<h4>Welcome back ! Hello {{auth()->user()->name}}</h4>
    <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
@endsection