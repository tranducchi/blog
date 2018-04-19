@extends('layouts.master')
@section('content')
<div class="col-lg-9">
		@foreach ($posts as $post)
			<div class="article mb-3">
						<div class="card">
							<div class="row">
								<div class="col-lg-4 img-description">
								<img class="img-thumbnail" src="storage/images/{{$post->img}}" alt="Card image cap">
								</div>
								<div class="col-lg-8 block-content">
									<div class="card-block">
									<h4 class="card-title"><a href="/detail-post/{{$post->id}}">{{$post->title}}</a></h4>
									<p class="card-text">{{$post->des}}.</p>
									<a href="/detail-post/{{$post->id}}" class="btn btn-primary mb-2 more">More than</a>
									</div>
								</div>
							</div>
							
						
						</div>
			</div> <!-- End article -->
		@endforeach
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