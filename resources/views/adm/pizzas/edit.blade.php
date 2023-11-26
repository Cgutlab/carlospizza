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
		@csrf
		@method('PUT')
		  <div class="row">
		  	<div class="file-field input-field">
		      <div class="btn">
		        <span>Image</span>
		        <input name="image" id="image" type="file" autocomplete="off" accept="image/*">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" autocomplete="off" accept="image/*" type="text" placeholder="{{$data->image}}">
		      </div>
		    </div>
		    <div class="input-field col s12">
		      <i class="material-icons prefix">speaker_notes</i>
		      <input id="name" autocomplete="off" name="name" value="{{$data->name}}" type="text" class="validate" autocomplete="off">
		      <label for="name">Name</label>
		    </div>
		    <div class="input-field col s12">
			    <select multiple name="ingredients[]" id="ingredients">
			        @foreach($items as $item)
			            <option value="{{ $item->id }}" {{ $data->ingredients->contains($item) ? 'selected' : '' }}>
			                {{ $item->name }}
			            </option>
			        @endforeach
			    </select>
			    <label for="ingredients">Select the ingredients</label>
				</div>
		    <div class="input-field col s12">
		      <span class="fs26 bold prefix">{{$percentSymbol}}</span>
		      <input id="percent" autocomplete="off" type="number" name="percent" value="{{$data->percent}}" type="tel" class="validate" autocomplete="off">
		      <label for="percent">Percent</label>
		    </div>
		  </div>
		  <button type="submit" class="btn right">Submit</button>
		</form>
</div>
  </main>

@endsection
