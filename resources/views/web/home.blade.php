@extends("layouts.master")

@section("content")


	<div class="container mt-4">
		<h2>კატეგორიები</h2>
		<div class="row">
			<div class="col-md-4">
				<ul class="list-group">
					@foreach($categories as $category)
						<li class="list-group-item">
							<a href="/category/{{ $category->id }}">{{ $category->title }}</a>
						</li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-8">
				@foreach($news_latest as $news)

				<div class="news-item">
					<a href="">
						<div class="row">
							<div class="col-md-3">
								<img src="{{ ($news->img) ? $news->img : "https://images.unsplash.com/photo-1606851181064-b7507b24377c?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" }}">
							</div>
							<div class="col-md-9">
								{{ $news->title }}
							</div>
						</div>
					</a>
				</div>

					

				@endforeach
			</div>
		</div>
	</div>


	

@endsection