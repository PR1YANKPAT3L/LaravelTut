@extends('base.base')

@section('maincontent')
	<form action="{{ url('api/validate/login') }}" method="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="text" name="email" placeholder="email">
		<input type="password" name="password" placeholder="password">
		<button>Login</button>
	</form>
	@if($errors->has())
		@foreach($errors->all() as $error)
			{{ $error }} <br>
		@endforeach
	@endif

@endsection