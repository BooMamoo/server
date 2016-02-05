@extends('template')

@section('content')
	<div class="container content">
		<div class="row form blue-grey lighten-5">
			<p class="text-form teal-text topic">Login</p>
			
			@if (count($errors) > 0)
				<div class="alert red-text red lighten-4">
					<strong>Whoops!</strong> There were some problems with your input.
					<ul>
						@foreach ($errors->all() as $error)
							<li> - {{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="col s12" method="POST" action="{{ url('/auth/login') }}" role="form">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
					<div class="input-field col s12">
						<input id="email" type="email" class="validate" value="{{ old('email') }}" name="email">
						<label for="email">E-mail Address</label>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" class="validate" name="password">
						<label for="password">Password</label>
					</div>
				</div>
			    
				<p>
					<input type="checkbox" class="filled-in" id="filled-in-box" name="remember" />
					<label for="filled-in-box">Remember Me</label>
				</p>

				<button class="btn waves-effect wave-light right submit" type="submit" name="action">Login</button>
				
			</form>
		</div>

	</div>
@endsection