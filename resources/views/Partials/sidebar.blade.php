 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dermrx</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->role == 'admin')
          <li class="nav-item menu-open">
            <a href="{{url('/admin-dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/allteam')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Team Members
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('billers')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Biller
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>                  
          </li>
          <li class="nav-item">
            <a href="{{ url('/services')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>                  
          </li>
          <li class="nav-item">
            <a href="{{ url('/all_customers')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                All Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>                  
          </li>
          @else
          <li class="nav-item menu-open">
            <a href="{{url('/team-dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>