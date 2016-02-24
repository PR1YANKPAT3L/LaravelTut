<form action="{{ url('/api/validate/register') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="text" name="name" placeholder="Full Name">
	<input type="email" name="email" placeholder="Email Address">
	<input type="password" name="password" placeholder="Password">
	<button>Register</button>
</form>
@if($errors->has())
	@foreach($errors->all() as $error)
		{{ $error }} <br>
	@endforeach
@endif