@extends('adm.layouts.app')
@section('title', 'Pizza Shop')
@section('content', 'Administrative Panel')
@section('main')

<main class="mt-15">
	<div class="container w-ful mt-15">
	  <div class="row">
	    <div class="col s12 m4">
	      <div class="card white-text orange-light">
	        <div class="card-content">
	          <span class="card-title flex-between">
	          <h4>
	          	Orders
	          </h4>
	          <h4>
	          	{{count($orders)}}
	          </h4>
	        </div>
	      </div>
	    </div>
	    <div class="col s12 m4">
	      <div class="card white-text orange-light">
	        <div class="card-content">
	          <span class="card-title flex-between">
	          <h4>
	          	Pizzas
	          </h4>
	          <h4>
	          	{{count($pizzas)}}
	          </h4>
	        </div>
	      </div>
	    </div>
	    <div class="col s12 m4">
	      <div class="card white-text orange-light">
	        <div class="card-content">
	          <span class="card-title flex-between">
	          	<h4>
	          		Ingredients
	          	</h4>
	          <h4>
	          	{{count($ingredients)}}
	          </h4>
	        </div>
	      </div>
	    </div>
		</div>

		<div class="row">
	    <div class="col s12">
	      <div class="card">
	        <div class="card-content">
	        	<div class="flex-between">
	        		<h4>
		          	Orders
		          </h4>
	        	</div>
			      <table class="highlight">
			        <thead>
			          <tr>
			              <th>Name</th>
			              <th>Date</th>
			              <th>Pizzas</th>
			              <th>Price</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@foreach($orders as $order)
			          <tr>
			            <td>{!! $order->name !!}</td>
			            <td>{!! $order->date !!}</td>
			            <td>
			            	@foreach($order->pizzas as $key => $pizz)
			            		{!!$pizz->pivot->quantity .'x '. $pizz->name!!}{!!$key < $order->pizzas->count()-1 ? '<br>' : ''!!}
			            	@endforeach
			            </td>
			            <td>{{$moneySymbol}}{!! $order->price !!}</td>
			          </tr>
			          @endforeach
			        </tbody>
			      </table>
	        </div>
	      </div>
	    </div>

	    <div class="col s12 m6">
	      <div class="card">
	        <div class="card-content">
	        	<div class="flex-between">
	        		<h4>
		          	Pizzas
		          </h4>
	        	</div>
			      <table class="highlight">
			        <thead>
			          <tr>
			              <th>Name</th>
			              <th>Ingredients</th>
			              <th>Percent</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@foreach($pizzas as $pizza)
			          <tr>
			            <td>{!! $pizza->name !!}</td>
			            <td>
			            	@foreach($pizza->ingredients as $key => $i)
			            		{{$i->name}}{{$key < $pizza->ingredients->count()-1 ? ',' : '.'}}
			            	@endforeach
			            </td>
			            <td>{!! $pizza->percent !!}{{$percentSymbol}}</td>
			          </tr>
			          @endforeach
			        </tbody>
			      </table>
	        </div>
	      </div>
	    </div>

	    <div class="col s12 m6">
	      <div class="card">
	        <div class="card-content">
	        	<div class="flex-between">
	        		<h4>
		          	Ingredients
		          </h4>
	        	</div>
			      <table class="highlight">
			        <thead>
			          <tr>
			              <th>Name</th>
			              <th>Price</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@foreach($ingredients as $ing)
			          <tr>
			            <td>{!! $ing->name !!}</td>
			            <td>{{$moneySymbol}}{!! $ing->price !!}</td>
			          </tr>
			          @endforeach
			        </tbody>
			      </table>
	        </div>
	      </div>
	    </div>
		</div>
	</div>
</main>

@endsection