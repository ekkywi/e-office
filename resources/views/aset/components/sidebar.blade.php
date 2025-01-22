<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url("itam/dashboard") }}">IT Asset Management</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url("itam/dashboard") }}">ITAM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown {{ Request::is("itam/dashboard") ? "active" : "" }}">
                <a class="nav-link" href="{{ url("itam/dashboard") }}"><i class="fas fa-rocket"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Asset</li>
            <li class="dropdown">
                <a class="nav-link" href="#"><i class="fas fa-box"></i> <span>Semua Aset</span></a>
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-computer"></i> <span>Komputer</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="#">Semua Komputer</a></li>
                    <li><a class="nav-link" href="#">Normal</a></li>
                    <li><a class="nav-link" href="#">Dalam Perbaikan</a></li>
                    <li><a class="nav-link" href="#">Rusak</a></li>
                    <li><a class="nav-link" href="#">Dimusnahkan</a></li>
                </ul>
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ url("dashboard") }}">
                    <i class="fas fa-rocket"></i> Kembali ke E-Office
                </a>
            </div>
    </aside>
</div>
