      <!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">

    @if(Route::has('login'))
      @auth
        <li class="nav-item"><a class="nav-link" href="{{url('/')}}"><span class="oi" data-glyph="home" title="Home" aria-hidden="true"></span> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('commerces.index') }}">Comercios</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Empleados</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('distributors.index') }}">Distribuidores</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('sales.index') }}">Ventas</a></li>        
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Usuario: {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>        
      @else 
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrese</a></li>        
      @endauth
    @endif

  </ul>
</div>
</nav>


