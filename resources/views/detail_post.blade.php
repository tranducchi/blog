

@extends('layouts.master')
@section('breadcrumb')
<div class="link-categories mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="/post-categories/{{$show_post->id_cat}}">{{$show_post->cat->name}}</a></li>
					<li class="breadcrumb-item">{{$show_post->title}}</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
</div> <!-- End link categories -->
@endsection
@section('content')
<div class="col-lg-9 block-article">
					<div class="des mb-5">
						<div class="row">
							<div class="col-lg-8">
								<h1 class="title-post">{{$show_post->title}}</h1>
							</div>
							<div class="col-lg-4 author">
							<i>Author: </i><b><i>{{$show_post->user->name}}</i></b>
							</div>
						</div>
					</div> <!-- End row top -->
					<div class="row">
						<div class="container content-post">
						<img src="/storage/images/{{$show_post->img}}" alt="" class="img-thumbnail" style="display:block; margin:auto">
							<div class="box-content">
								{!!$show_post->content!!}
							</div>
						</div>
					</div> <!-- End row content -->

				</div> 	<!-- End left -->
@endsection
@section('below')
	<div class="below">
			<div class="row mt-3">
				<div class="col-lg-9">
					<div class="recent-post">
						<h4 class="title pt-2 pb-3">Recent Post</h4>
						<div class="owl-carousel owl-theme">
							@foreach ($recent_post as $r)
								<div class="item">
									<div class="card one-card" style="width: 18rem;">
									<img class="card-img-top" style="width:100%; height:100%" src="/storage/images/{{$r->img}}" alt="Card image cap">
										<div class="card-body">
										<h5 class="card-title">{{$r->title}}</h5>
										<a href="/detail-post/{{$r->id}}" class="btn btn-primary more btn-sm">More than</a>
										</div>
									</div>
								</div>
							@endforeach
								
							</div>
					</div>
				</div>
			</div> 
			{{-- End row recent post --}}
			
			<div class="row">
							<div class="col-lg-9">
								<h4 class="pt-3 pb-3">Comments</h4>
								@if (!Auth::guest())
									{!!Form::open(['action'=>'CommentsController@store'])!!}
									{!!Form::textarea('comment_text', null, ['class' => 'form-control mb-2', 'rows'=>'6', 'placeholder'=>'Enter your comment'])!!}
									{!!Form::button('Submit', ['class'=>'btn btn-primary mb-4', 'type'=>'<submit></submit>'])!!}
									{!!Form::hidden('_method','POST')!!}
									{!!Form::hidden('id_user', Auth::user()->id)!!}
									{!!Form::hidden('id_post', $show_post->id)!!}
									{!!Form::close()!!}
									<!--  End form comments -->	
								@else
									<p class="alert alert-warning">Login for comments</p>
								@endif
								
							</div>
						</div>
						<div class="row">
							<div class="col-lg-9">
								@foreach ($comment as $cm)
									<div class="card mb-3">
								  <div class="card-header">
											{{$cm->user->name}}
								  </div>
								  <div class="card-body">
									<p>{{$cm->comment_text}}</p>
								  </div>
								</div><!--  End -card -->
								@endforeach
							
							</div>
						</div>
		</div>
@endsection
@section('script')
	<script>
		$('.owl-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		})
	</script>
@endsection