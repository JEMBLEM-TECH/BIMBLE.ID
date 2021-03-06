<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="{{ (Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="menu-title text-capitalize">Manage Kursus</li>

                <li class="{{ (request()->is('manager/kursus*')) ? 'active' : '' }}">
                    <a href="{{ route('kursus.index') }}"> <i class="menu-icon fa fa-database"></i>Data Kursus</a>
                </li>

                <li class="menu-title text-capitalize">Manage Galeri Kursus</li>

                <li class="{{ (request()->is('manager/gallery*')) ? 'active' : '' }}">
                    <a href="{{ route('gallery.index') }}"> <i class="menu-icon fa fa-camera"></i>Data Galeri Kursus</a>
                </li>

                <li class="menu-title text-capitalize">Manage Unit</li>
                <li class="{{ (request()->is('manager/unit*')) ? 'active' : '' }}">
                    <a href="{{ route('unit.index') }}"> <i class="menu-icon fa fa-user"></i>Data Unit</a>
                </li>

                <li class="menu-title text-capitalize">Manage Pendaftar </li>
                <li class="{{ 
                              (Request::route()->getName() == 'pendaftar.index') ? 'active' : ''
                          }}">
                    <a href="{{ route('pendaftar.index') }}"> <i class="menu-icon fa fa-users"></i>Data Pendaftar
                        Unit</a>
                </li>

                <li class="menu-title text-capitalize">Manage Review </li>
                <li class="{{ 
                              (Request::route()->getName() == 'komentar.index') ? 'active' : ''
                          }}">
                    <a href="{{ route('komentar.index') }}"> <i class="menu-icon fa fa-comments"></i>Data Review
                        Kursus</a>
                </li>

                <li class="menu-title text-capitalize">Banner Web</li>
                <li class="{{ 
                              (Request::route()->getName() == 'banner.index') ? 'active' : ''
                          }}">
                    <a href="{{ route('banner.index') }}"> <i class="menu-icon fa fa-image"></i>Data Banner</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
