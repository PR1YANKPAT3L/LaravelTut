<form action="{{ url('api/validate/blog') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="title" placeholder="Title">
	<textarea name="content" id="" placeholder="Please enter your content" cols="30" rows="10"></textarea>
	<button>submit</button>
</form>
@if($errors->has())
	@foreach($errors->all() as $error)
		{{ $error }} <br>
	@endforeach
@elseif(session('success'))
	{{ session('success') }}
@endif