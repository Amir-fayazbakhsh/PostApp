@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-center">
	<div class="w-50 p-2 bg-light text-dark">
		<form action="/register" method="POST">
			@csrf
			  <div class="form-group">
			    <label for="Name">Name</label>
			    <input type="text" name="name" class="form-control @error('name') border border-danger @enderror" id="Name" aria-describedby="Name" placeholder="Your name" value="{{old('name')}}">
			    @error('name')<div class="text-danger mt-2 text-sm">{{$message}}</div>@enderror
			  </div>
			  <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" name="username" class="form-control @error('username') border border-danger @enderror" id="Username" placeholder="Username" value="{{old('username')}}">
			    @error('username')<div class="text-danger mt-2 text-sm">{{$message}}</div>@enderror
			  </div>
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
			    <label for="password_confirmation">Confirm Password</label>
			    <input type="password" name="password_confirmation" id="confirm-Password" class="form-control @error('password-confirmation') border border-danger @enderror"  placeholder="Repeat ">
			  </div>
			  <button type="submit" class="btn btn-primary">sign up</button>
		</form>
	</div>
</div>

@endsection