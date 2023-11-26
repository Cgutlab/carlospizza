<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#083756" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf_token: '{{ csrf_token() }}' }</script>
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href=" {{ asset('css/materialize/materialize.min.css')}}" rel="stylesheet">
    <link href="{{ asset('icons/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
  
<div class="row">

  @include('adm.layouts.navbar')
  @include('adm.layouts.sidebar')

  <div class="col l10 s12 offset-l2 pad-3">
  <div class="container containerMain">
      @yield('main')
    </div>
  </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize/materialize.min.js') }}"></script>
<script>
  $(document).ready(function(){
    $('.collapsible').collapsible();
    $('.sidenav').sidenav({
        closeOnClick: false
    });
    $('.dropdown-trigger').dropdown({
        constrainWidth: false,
        closeOnClick: true,
        hover: false
    });
    $('.dropdown-buscador').dropdown({
        constrainWidth: false,
        closeOnClick: false,
    });
    $('select').formSelect();
    $('.materialboxed').materialbox();
  });

</script>
<script type="text/javascript">
  function confirm_delete() {
    return confirm('Are you sure you want to delete this?');
  }
</script>

<script>
@if(isset($success))
  M.toast({html: '{!!$success!!}', classes: 'rounded'});
@endif

@if(session('success'))
  M.toast({html: '{!!session('success')!!}', classes: 'rounded'});
@endif

@if(count($errors) > 0)
@foreach($errors->all() as $error)
  M.toast({html: '{!!$error!!}', classes: 'rounded'});
@endforeach
@endif
</script>
</body>
</html>
