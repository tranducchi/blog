@extends('layouts.master')
@section('title')
Search form	
@endsection
@section('breadcrumb')
<div class="link-categories mt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item">Search</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
</div> <!-- End link categories -->
@endsection
@section('content')
<div class="container">
   <?php echo '<b>'.count($data).'</b>'.'Result this for search'; ?>
   <?php 
		function replaceColor($key, $arr){
			return str_replace($key, '<span style="color:red">'.$key.'</span>', $arr);
		}
   ?>
</div>
<div class="col-lg-9">
		@if (count($data) > 0)
					@foreach ($data as $post)
						<div class="article mb-3">
							<div class="card">
								<div class="row">
									<div class="col-lg-4 img-description">
									<img class="img-thumbnail" src="/storage/images/{{$post->img}}" alt="Card image cap">
									</div>
									<div class="col-lg-8 block-content">
										<div class="card-block">
										<h4 class="card-title"><a href="/detail-post/{{$post->id}}">{!! replaceColor($content, $post->title) !!}</a></h4>
										<p class="card-text">{{$post->des}}.</p>
											<a href="/detail-post/{{$post->id}}	" class="btn btn-primary">More than</a>
										</div>
									</div>
								</div>	
						</div>
			</div> <!-- End article -->

		@endforeach
		@else
		{{"Not found"}}
		@endif
	
			


<div class="row">
						<div class="col-lg-12">
							<div class="paginate float-right">
								<nav aria-label="Page navigation example">
								 
								</nav>
							</div>
						</div>
					</div>
				</div>
@endsection