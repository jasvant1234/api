
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link " >
        <a href="#" class="brand-link">
            <img src="vendors/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>


    <!-- Sidebar -->
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="vendors/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jasvant</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline" >
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{route('home')}}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" >
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{route('test')}}" class="nav-link {{ (request()->is('test')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-magnet"></i>
                        <p>
                            Test
                        </p>
                    </a>
                </li>


                <li class="nav-item menu-open">
                    <a href="{{route('mail')}}" class="nav-link {{ (request()->is('mail')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Send Mail
                        </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{route('slider')}}" class="nav-link {{ (request()->is('slider')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Slider Show
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
