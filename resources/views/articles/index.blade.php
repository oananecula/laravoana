@extends ('layout')


@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
            @forelse($articles as $article)
					<h3><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h3>
					<p>{{ $article->excerpt }}</p>
					<p>
						@foreach($article->tags as $tag)
							<a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a>
						@endforeach
					</p>

				@empty

					<p>No relevant articles yet.</p>

			@endforelse
			
		</div>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
@endsection