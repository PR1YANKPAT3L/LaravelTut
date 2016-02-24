<ul>
	@foreach(\App\Blog::get() as $singleblog)
		<li>
			<h1>{{ $singleblog->title }}</h1>
			<p>{{ $singleblog->content }}</p>
			<a href="">{{ $singleblog->author->name }}</a>
		</li>
	@endforeach
</ul>