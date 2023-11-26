@extends('adm.dashboard')

@section('content', 'Create an ' .' '. substr($model, 0, -1))

@section('main')
<main>
  <div class="container w-ful">
  <div class="row">
  	<div class="flex-between">
  		<a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light orange right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  	</div>
  </div>
	<div class="row">
		<form action="{{route(strtolower($model).'.store')}}" method="POST" accept-charset="UTF-8" class="col s12" enctype="multipart/form-data">
		{{ csrf_field() }}
		  <div class="row">
		    <div class="input-field col s12">
		      <i class="material-icons prefix">speaker_notes</i>
		      <input id="name" autocomplete="off" name="name" value="{{old('name')}}" type="text" class="validate" autocomplete="off">
		      <label for="name">Name</label>
		    </div>
				<div class="input-field col s12">
				    <select multiple name="pizzas[]" id="pizzas">
				        @foreach($items as $pizza)
				            <option value="{{ $pizza->id }}" data-percent="{{ $pizza->percent }}" data-cost="{{ $pizza->ingredients->sum('pivot.cost') }}">
				                {{ $pizza->name }}
				            </option>
				        @endforeach
				    </select>
				    <label for="pizzas">Select the pizzas</label>
				</div>
				<div class="input-field col s12">
				    <label for="price">Price</label>
				    <input id="price" name="price" type="text" value="0" readonly>
				</div>
		  </div>
		  <div class="row">
		  	<div class="col s4 offset-s8">
					<div id="pizzaQuantities"></div>
		  	</div>
		  </div>
		  <button type="submit" class="btn right">Submit</button>
		</form>
	</div>
</main>
<script src="{{ asset('js/adm/order_create.js') }}"></script>
@endsection