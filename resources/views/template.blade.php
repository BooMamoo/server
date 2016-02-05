<!doctype html>

<html>
	<head>
		<base href="/">

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="iot platform">
		<meta name="description" content="The project is about creating an IoT platform for connecting many devices into one point which we can easily manage or get the data.">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script src="js/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>	

		<title> IoT PAS </title>
	</head>

	<body>
		<div>
		<a href="{{ url('/auth/logout') }}" target="_self">Logout</a>

			@yield('content')

		</div>

		<script>
			$(document).ready(function() {

				@yield('script')

			});
		</script>
	</body>

</html>