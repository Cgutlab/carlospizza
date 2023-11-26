<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pizza Shop</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('css/materialize/materialize.min.css')}}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	<link href="{{ asset('css/page.css') }}" rel="stylesheet">
</head>
<body>
	<nav>
	  <div class="nav-wrapper">
	  	<div class="container w-ful">
	    	<a href="#" class="brand-logo">Pizza Shop</a>
	    	<ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="{{route('adm.dashboard')}}">Administrative Panel</a></li>
	      </ul>
	  	</div>
	  </div>
	</nav>
	<div class="container mt-10 w-ful">
	  <div class="row">
			@foreach($data as $dat)
	    <div class="col s12 m4">
		      <div class="card">
		        <div class="card-image">
							@if (file_exists(public_path('img/pizzas/'.$dat->image)))
								<img src="{{asset('img/pizzas/'.$dat->image)}}" alt="{{$dat->name}}">
							@endif
		          <span class="card-title">
		          	{!! $dat->name !!}
		        	</span>
		        </div>
		        <div class="card-content">
		          <p>
		          	@foreach ($dat->ingredients as $key => $ingredient)
	                {{$ingredient->name}}{{$key < $dat->ingredients->count()-1 ? ',' : '.'}}
	              @endforeach
		          </p>
		        </div>
		      </div>
	    </div>
		  @endforeach
	  
	  </div>
	</div>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize/materialize.min.js') }}"></script>
</body>
</html>