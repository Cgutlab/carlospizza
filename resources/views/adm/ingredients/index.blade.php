@extends('adm.dashboard')

@section('content', 'List of ' .' '. $model)

@section('main')
<main>
<div class="container w-ful">
<div class="row">
	<div class="flex-between">
		<a href="{{ route('adm.dashboard')}}" class="btn-floating btn-medium waves-effect waves-light orange right ml-3x"><i class="material-icons">keyboard_backspace</i></a>
		<a href="{{ route(strtolower($model).'.create')}}" class="btn-floating btn-medium waves-effect waves-light orange right ml-3x"><i class="material-icons">add</i></a>
	</div>
</div>
<div class="row">
	<div class="col s12">
		<table class="highlight bordered">
			<thead>
				<td>Image</td>
				<td>Name</td>
				<td>Price</td>
				<td class="right">Actions</td>
			</thead>
			<tbody>
				@foreach($data as $dat)
				<tr>
					<td>
						@if (file_exists(public_path('img/'.strtolower($model).'/'.$dat->image)))
							<img src="{{asset('img/'.strtolower($model).'/'.$dat->image)}}" alt="{{$dat->name}}" class="materialboxed">
						@endif
					</td>
					<td>
						{!! $dat->name !!}
					</td>
					<td>
						{{$moneySymbol}}{!! $dat->price !!}
					</td>
					<td class="right flex-center col s12">
				    <a href="{{ route(strtolower($model).'.edit', $dat->id) }}" class="btn-floating btn-small waves-effect wave orange m-3"><i class="fas fa-pencil-alt"></i></a>
				    <form action="{{ route(strtolower($model).'.destroy', $dat->id) }}" method="POST" accept-charset="UTF-8">
				        @csrf
				        @method('DELETE')
				        <button type="submit" onclick="return confirm_delete()" class="btn-floating btn-small waves-effect wave red m-3"><i class="fas fa-trash-alt"></i></button>
				    </form>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<span class="right">
	{{ $data->render() }}
</span>
</div>
</main>

@endsection