
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home">{{config('app.name')}}</a>
  <ul class="navbar-nav float-end" style="align-self: flex-end">
    <li class="nav-item">
      <a class="nav-link" href="/home">HOME</a>
    </li>
  </ul>
  @if(Auth::guest())
  <ul class="navbar-nav me-auto" style="margin-left: 70vw;">
    <li class="nav-item">
      <a class="nav-link" href={{route('login')}}>LOGIN</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href={{route('register')}} >REGISTER</a>
    </li>
  </ul>
  @else
  <ul class="navbar-nav" style="margin-left: 78vw;">
    <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    {{Auth::user()->name}} <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @if(Auth::user()->role->id == 1)
      <li><a href={{route('administration')}}>ADMINISTRATION</a></li>
    @endif
    <li>
      <a href={{route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
        </form>
    </li>
        
  </ul>
  </ul>
  @endif
</nav>


