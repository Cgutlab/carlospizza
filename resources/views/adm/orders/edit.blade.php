@extends('adm.dashboard')

@section('content', 'Edit a ' .' '. substr($model, 0, -1))

@section('main')
<main>
  <div class="container w-ful">
  <div class="row">
  	<div class="flex-between">
  		<a href="{{route(strtolower($model).'.index')}}" class="btn-floating btn-medium waves-effect waves-light orange right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
  	</div>
  </div>
	<div class="row">
    <form action="{{ route(strtolower($model).'.update', $data->id) }}" method="POST" accept-charset="UTF-8" class="col s12" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">speaker_notes</i>
                <input id="name" autocomplete="off" name="name" value="{{ old('name', $data->name) }}" type="text" class="validate" autocomplete="off">
                <label for="name">Name</label>
            </div>
            <div class="input-field col s12">
                <select multiple name="pizzas[]" id="pizzas">
                    @foreach($items as $pizza)
                    		<option value="{{ $pizza->id }}" data-percent="{{ $pizza->percent }}" data-cost="{{ $pizza->ingredients->sum('pivot.cost') }}" {{ in_array($pizza->id, $data->pizzas->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $pizza->name }}
                        </option>
                    @endforeach
                </select>
                <label for="pizzas">Select the pizzas</label>
            </div>
            <div class="input-field col s12">
                <label for="price">Price</label>
                <input id="price" name="price" type="text" value="{{ $data->price }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col s4 offset-s8">
                <div id="pizzaQuantities">
                    @foreach($data->pizzas as $pizza)
                    <div class="input-field">
                        <input type="number" name="quantity[]" id="quantity_{{ $pizza->id }}" min="1" value="{{ $pizza->pivot->quantity }}">
                        <label for="quantity_{{ $pizza->id }}">Quantity for {{ $pizza->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
          </div>
        <button type="submit" class="btn right">Update</button>
    </form>
</div>
</main>
<script src="{{ asset('js/adm/order_create.js') }}"></script>

@endsection
