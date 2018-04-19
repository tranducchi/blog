<div class="categories">
	<h4 class="btn btn-primary mb-4">Categories</h4>
	<div class="block-categories">
		<ul class="list-group">
			@foreach ($cat as $c)
					<li class="list-group-item d-flex justify-content-between align-items-center">
					<a href="/post-categories/{{$c->id}}">{{$c->name}}</a>
					<span class="badge badge-primary badge-pill">{{count($c->posts)}}</span>
					</li>
			@endforeach
		
		</ul>
	</div>
</div>