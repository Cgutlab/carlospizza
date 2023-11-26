<nav>
    <ul id="nav-mobile col s12" class="nav-wrapper">
      <li class="personalNavBar1">
          <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      </li>

      <li class="col l6 m9 s6 push-l2">
        <h1 class="personalNavBar2">
            @yield('title')
          <span class="hide-on-small-only">
          - @yield('content')
          @if(isset($section))
            {{' - '.substr(ucwords(strtolower($section)), 0, 20) .'..'}}
          @endif
          </span>
        </h1>
      </li>

      <li class="right">
          <a class='dropdown-trigger' href='#' data-target='dropdown-control'>
            <div class="personalNavBar3">
              <i class="material-icons">settings</i>
            </div>
          </a>
      </li>
      <li class="right hide-on-med-and-down">
        <span class="personalNavBar4">
          Welcome, {{ ucwords(Auth::user()->name) }}
        </span>
      </li>
    </ul>
</nav>

<ul id='dropdown-control' class='dropdown-content personalNavBar5'>
  <li>
    <a href="mailto:cgutlab@gmail.com">
      <i class="material-icons">chat</i>
        Support
    </a>
  </li>
  <li class="divider"></li>
  <li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="material-icons">exit_to_app</i>
        Logout
    </a>
  </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="personalNavBar6">
  {{ csrf_field() }}
</form>
