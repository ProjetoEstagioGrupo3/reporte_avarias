<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="brand-text font-weight-light">Reporte Avarias</span>
  </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Painel Principal
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/home" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Avarias Reportadas</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lista de Reparações</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportar Avarias</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="Equipamentos" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Equipamentos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="{{route('pc')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Computadores</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('projet')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Projetores</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('switch')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Switchs</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('bast')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Bastidores</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('accesP')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>AccessPoints</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="/Equipamentos" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Equipamentos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Tipos" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Tipo de Equipamentos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/register" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Professores
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Marcas" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Marcas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Localizacoes" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Localizações
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/TipoAvarias" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Tipo Avarias
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/Estatisticas" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Estatísticas
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{asset("AdminLTE/pages/widgets.html")}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Ajuda de desenvolvedor
            </p>
          </a>
        </li>
        
  
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>