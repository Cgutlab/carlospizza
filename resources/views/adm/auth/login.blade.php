<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrf_token: '{{ csrf_token() }}' }</script>
    <title>Login</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href=" {{ asset('css/materialize/materialize.min.css')}}" rel="stylesheet">

    <link href="{{ asset('icons/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body class="main-bg-color-dark">

  <main>
  <div class="container mt-15 w-ful">
    <div class="row">
      <div class="col offset-l4 l4 offset-m3 m6 s12 container personalAbsolute">
          <div class="card horizontal">
              <div class="row">
                <div class="col s10 offset-s1">
                    <div class="logo-login mt-15">
                        <h3>Login</h3>
                        <label>
                          carlos@gmail.com<br>
                          password
                        </label>
                    </div>
                    <form action="{{route('adm.auth.auth')}}" method="POST" accept-charset="UTF-8" class="col s12">
                    {{ csrf_field() }}
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="username" name="username" value="{{old('username')}}" type="text" class="validate" autocomplete="off">
                          <label for="username">Username</label>
                        </div>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">https</i>
                          <input id="password" type="password" name="password" value="{{old('password')}}" type="tel" class="validate" autocomplete="off">
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <button type="submit" class="btn right">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  </main>

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
          closeOnClick: false,
          hover: true
      });
      $('.dropdown-buscador').dropdown({
          constrainWidth: false,
          closeOnClick: false,
      });
    });
    @if(session('success'))
      M.toast({html: '{!!session('success')!!}', classes: 'rounded'});
    @endif
  </script>

</body>
</html>
