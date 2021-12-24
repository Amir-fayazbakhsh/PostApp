@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center">
	@if(session('status'))
		{{session('status')}}
	@endif
	<div class="w-50 mt-5 p-2 bg-light text-dark">

		<form action="/login" method="POST">
			@csrf
			  <div class="form-group">

			    <label for="email">Email</label>
			    <input type="email" name="email" class="form-control @error('email') border border-danger @enderror" id="Email" placeholder="Email" value="{{old('email')}}">
			    @error('email')<div class="text-danger mt-2 text-sm">{{$message}}</div>@enderror
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" name="password" class="form-control @error('password') border border-danger @enderror" id="Password" placeholder="Password">
			    @error('password')<div class="text-danger mt-2 text-sm">{{$message}}</div>@enderror
			  </div>
			  <div class="form-group">
			  	<label for="remember">Remember me</label>
			  	<input type="checkbox" name="remember" id="remember">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
</div>

@endsection