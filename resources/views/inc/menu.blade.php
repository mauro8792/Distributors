      <!-- Static navbar -->
<nav class="navbar navbar-inverse navbar-expand-lg navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">

    @if(Route::has('login'))
      @auth
          <li class="nav-item"><a class="nav-link" href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>      
        @if(Auth::user()->hasRole('admin'))
          <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Lineas</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('commerces.index') }}">Comercios</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('employees.index') }}">Empleados</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('distributors.index') }}">Distribuidores</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ventas</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('sales.index') }}">Todas</a>            
              <a class="dropdown-item" href="{{ route('sales.salesForEmployee') }}">Ventas Por Usuario</a>            
              <a class="dropdown-item" href="{{ route('sales.index') }}">Ventas Por Línea</a>        
            </div>    
          </li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ route('sales.index') }}">Ventas</a></li>
        @endif        
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa fa-user"></i> Usuario: {{ Auth::user()->name }} {{ Auth::user()->lastname }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>        
      @else 
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrese</a></li>        
      @endauth
    @endif

  </ul>
</div>
</nav>


