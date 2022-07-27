<nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <ul class="navbar-nav">
            <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">CMS <span class="sr-only"></span></a>
      </li>
            <!-- Dropdown -->
            @foreach ($menus as $menu)
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    {{$menu->name}}
                </a>
                <div class="dropdown-menu">
                    @foreach ($menu->posts as $menuPost)
                        <a class="dropdown-item" href="{{ url('posts/details/'.$menuPost->id) }}">{{$menuPost->pivot->name}}</a>
                    @endforeach
                </div>
                </li>
            @endforeach
        </ul>

        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="navbar-nav">
                @php($user = Auth::user())
                @if($user != null)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus') }}"> MENUS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('postsView') }}"> POSTS </a>
                    </li>
                    @if($user->role != null && $user->role->id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administration') }}"> ADMINISTRATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('getRolesView') }}"> ROLES </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> LOGOUT</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Register</a>
                    </li>
                @endif
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">{{ csrf_field() }}</form>
        </div>
    </nav>