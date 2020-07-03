<!-- Navbar -->
<nav class=" main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset("AdminLTE/dist/img/user2-160x160.jpg")}}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{auth()->User()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{asset("AdminLTE/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
            <p>
              {{auth()->User()->name}} - {{auth()->User()->funcao}}
            </p>
          </li>
          <!-- Menu Body -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-primary btn-flat">Prefil</a>
            <a href="/home" class="btn btn-danger btn-flat"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sair</a>
          <form id="logout-form"action="{{route('logout')}}" method="POST" style="display:nome;">
             @csrf
          </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>