<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laravel Paste Bucket</title>
	<meta name="viewport" content="width=device-width">

	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<body onload="prettyPrint()">

	@if ($errors->count() > 0)
		<div class="error-popup">
			<ul>
			@foreach ($errors->all() as $message)
				<li>ERROR: {{ $message }}</li>
			@endforeach
			</ul>
		</div>
	@endif
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://laravel.com">
				{{ HTML::image('img/logo-head.png', 'Laravel', ['style' => 'height: 20px;']) }}
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="nav">
			<ul class="nav navbar-nav pull-right">
				@yield('buttons')
			</ul>
		</div><!-- /.navbar-collapse -->

	</nav>



	<div id="container">
		@yield('content')
	</div>

	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/prettify.js') }}
	{{ HTML::script('js/tabby.js') }}
	{{ HTML::script('js/script.js') }}
	@yield('scripts')
</body>
</html>