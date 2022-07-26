
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/home">{{config('app.name')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/home">HOME <span class="sr-only"></span></a>
      </li>
    </ul>
        @if (Auth::guest())
            <li class="nav-item"><a class="nav-link" href={{route('login')}}>LOGIN</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('register')}}">REGISTER</a></li>
        @else
          <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">LOGOUT</a></li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        @endif
  </div>
</nav>


