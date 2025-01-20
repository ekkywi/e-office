@php
    use Illuminate\Support\Facades\Auth;
@endphp

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky-top">
    <a class="navbar-brand sidebar-gone-hide" href="dashboard">E-Office</a>
    <a class="nav-link sidebar-gone-show" data-toggle="sidebar" href="#"><i class="fas fa-bars"></i></a>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a class="nav-link nav-link-lg d-sm-none" data-toggle="search" href="#"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input aria-label="Search" class="form-control" data-width="250" placeholder="Search" type="search">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a class="search-close" href="#"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a class="nav-link nav-link-lg message-toggle beep" data-toggle="dropdown" href="#"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>

                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a class="nav-link notification-toggle nav-link-lg beep" data-toggle="dropdown" href="#"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">

                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" data-toggle="dropdown" href="#">
                <figure class="avatar mr-2 avatar-sm bg-info text-white" data-initial="{{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}"></figure>
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a class="dropdown-item has-icon" href="features-profile.html">
                    <i class="far fa-user"></i> Profile
                </a>
                <a class="dropdown-item has-icon" href="features-activities.html">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a class="dropdown-item has-icon" href="features-settings.html">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="/logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
    <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is("dashboard") ? "active" : "" }}"><a class="nav-link" href="{{ url("dashboard") }}"><i class="fa fa-rocket"></i><span>Dashboard</span></a></li>
                <li class="nav-item {{ Request::is("aplikasi") ? "active" : "" }}"><a class="nav-link" href="{{ url("aplikasi") }}"><i class="fa fa-fire-flame-curved"></i><span>Aplikasi</span></a></li>
                <li class="nav-item {{ Request::is("pengaturan") ? "active" : "" }}"><a class="nav-link" href="{{ url("pengaturan") }}"><i class="fa fa-cog"></i><span>Pengaturan</span></a></li>
                <li class="nav-item {{ Request::is("bantuan") ? "active" : "" }}"><a class="nav-link" href="{{ url("bantuan") }}"><i class="fa fa-circle-question"></i><span>Bantuan</span></a></li>
                <li class="nav-item {{ Request::is("maintenance") ? "active" : "" }}"><a class="nav-link" href="{{ url("maintenance") }}"><i class="fa fa-wrench"></i><span>Maintenance</span></a></li>
            </ul>
        </div>
    </nav>
</nav>
