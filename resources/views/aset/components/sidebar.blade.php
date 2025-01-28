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

            {{-- Menu Dashboard --}}
            <li class="dropdown {{ Request::is("itam/dashboard") ? "active" : "" }}">
                <a class="nav-link" href="{{ url("itam/dashboard") }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Data Aset</li>

            {{-- Menu Data Aset --}}
            <li class="dropdown {{ Request::is("itam/aset/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-cube"></i> <span>Data Aset</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/aset/semua-aset") ? "active" : "" }}"><a class="nav-link" href="#">Semua Aset</a></li>
                    <li class="{{ Request::is("itam/aset/sedang-digunakan") ? "active" : "" }}"><a class="nav-link" href="#">Sedang Digunakan</a></li>
                    <li class="{{ Request::is("itam/aset/tanpa-pic") ? "active" : "" }}"><a class="nav-link" href="#">Tanpa PIC</a></li>
                    <li class="{{ Request::is("itam/aset/dipinjam") ? "active" : "" }}"><a class="nav-link" href="#">Dipinjam</a></li>
                    <li class="{{ Request::is("itam/aset/perbaikan") ? "active" : "" }}"><a class="nav-link" href="#">Perbaikan</a></li>
                    <li class="{{ Request::is("itam/aset/rusak") ? "active" : "" }}"><a class="nav-link" href="#">Rusak</a></li>
                    <li class="{{ Request::is("itam/aset/dimusnahkan") ? "active" : "" }}"><a class="nav-link" href="#">Dimusnahkan</a></li>
                </ul>
            </li>

            {{-- Menu Hardware --}}
            <li class="dropdown {{ Request::is("itam/hardware/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-computer"></i> <span>Hardware</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/hardware/komputer") ? "active" : "" }}"><a class="nav-link" href="#">Komputer</a></li>
                    <li class="{{ Request::is("itam/hardware/laptop") ? "active" : "" }}"><a class="nav-link" href="#">Laptop</a></li>
                    <li class="{{ Request::is("itam/hardware/monitor") ? "active" : "" }}"><a class="nav-link" href="#">Monitor</a></li>
                    <li class="{{ Request::is("itam/hardware/printer") ? "active" : "" }}"><a class="nav-link" href="#">Printer</a></li>
                    <li class="{{ Request::is("itam/hardware/scanner") ? "active" : "" }}"><a class="nav-link" href="#">Scanner</a></li>
                    <li class="{{ Request::is("itam/hardware/toner") ? "active" : "" }}"><a class="nav-link" href="#">Toner</a></li>
                </ul>
            </li>

            {{-- Menu Komponen --}}
            <li class="dropdown {{ Request::is("itam/komponen/*") ? "active" : "" }} ">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-memory"></i> <span>Komponen</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/komponen/processor") ? "active" : "" }}"><a class="nav-link" href="#">Processor</a></li>
                    <li class="{{ Request::is("itam/komponen/ram") ? "active" : "" }}"><a class="nav-link" href="#">RAM</a></li>
                    <li class="{{ Request::is("itam/komponen/hardisk") ? "active" : "" }}"><a class="nav-link" href="#">Hardisk</a></li>
                    <li class="{{ Request::is("itam/komponen/ssd") ? "active" : "" }}"><a class="nav-link" href="#">SSD</a></li>
                    <li class="{{ Request::is("itam/komponen/vga") ? "active" : "" }}"><a class="nav-link" href="#">VGA</a></li>
                    <li class="{{ Request::is("itam/komponen/powersupply") ? "active" : "" }}"><a class="nav-link" href="#">Power Supply</a></li>
                </ul>
            </li>

            {{-- Menu Akseoris --}}
            <li {{ Request::is("itam/aksesoris/*") ? "active" : "" }} class="dropdown">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-keyboard"></i> <span>Aksesoris</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/aksesoris/keyboard") ? "active" : "" }}"><a class="nav-link" href="#">Keyboard</a></li>
                    <li class="{{ Request::is("itam/aksesoris/mouse") ? "active" : "" }}"><a class="nav-link" href="#">Mouse</a></li>
                    <li class="{{ Request::is("itam/aksesoris/speaker") ? "active" : "" }}"><a class="nav-link" href="#">Speaker</a></li>
                    <li class="{{ Request::is("itam/aksesoris/webcam") ? "active" : "" }}"><a class="nav-link" href="#">Webcam</a></li>
                </ul>
            </li>

            {{-- Menu Lisensi --}}
            <li class="dropdown {{ Request::is("itam/lisensi/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-key"></i> <span>Lisensi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/lisensi/semua-lisensi") ? "active" : "" }}"><a class="nav-link" href="#">Semua Lisensi</a></li>
                    <li class="{{ Request::is("itam/lisensi/sistem-operasi") ? "active" : "" }}"><a class="nav-link" href="#">Sistem Operasi</a></li>
                    <li class="{{ Request::is("itam/lisensi/aplikasi") ? "active" : "" }}"><a class="nav-link" href="#">Aplikasi</a></li>
                </ul>
            </li>

            {{-- Menu Stok Aset --}}
            <li class="{{ Request::is("itam/stok-aset") ? "active" : "" }}">
                <a class="nav-link" href="#"><i class="fas fa-cubes"></i> <span>Stok Aset</span></a>
            </li>

            <li class="menu-header">Penomoran Aset</li>

            {{-- Menu Penomoran --}}
            <li class="dropdown {{ Request::is("itam/penomoran/*") ? "active" : "" }}">
                <a class="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-list-ol"></i> <span>Penomoran</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/penomoran/nomor-inv") ? "active" : "" }}"><a class="nav-link" href="#">Nomor INV</a></li>
                    <li class="{{ Request::is("itam/penomoran/nomor-sip") ? "active" : "" }}"><a class="nav-link" href="#">Nomor SIP</a></li>
                    <li class="{{ Request::is("itam/penomoran/nomor-aset") ? "active" : "" }}"><a class="nav-link" href="#">Nomor Aset</a></li>
                </ul>
            </li>

            <li class="menu-header">Pengaturan</li>

            {{-- Menu Pengaturan --}}
            <li class="dropdown {{ Request::is("itam/pengaturan/*") ? "active" : "" }}">
                <a class ="nav-link has-dropdown" data-toggle="dropdown" href="#"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/pengaturan/status-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("itam/pengaturan/status-aset") }}">Status Aset</a></li>
                    <li class="{{ Request::is("itam/pengaturan/kategori-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("itam/pengaturan/kategori-aset") }}">Kategori Aset</a></li>
                    <li class="{{ Request::is("itam/pengaturan/merk-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("itam/pengaturan/merk-aset") }}">Merk Aset</a></li>
                    <li class="{{ Request::is("itam/pengaturan/model-aset") ? "active" : "" }}"><a class="nav-link" href="{{ url("itam/pengaturan/model-aset") }}">Model Aset</a></li>
                    <li class="{{ Request::is("itam/pengatura/supplier-aset") ? "active" : "" }}"><a class="nav-link" href="#">Supplier Aset</a></li>
                </ul>
            </li>

            <li class="menu-header">Laporan</li>

            {{-- Menu Laporan --}}
            <li class="dropdown {{ Request::is("itam/laporan/*") ? "active" : "" }}">
                <a class='nav-link has-dropdown' data-toggle="dropdown" href="#"><i class="fas fa-file"></i> <span>Log</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is("itam/laporan/log-aset") ? "active" : "" }}"><a class="nav-link" href="#">Log Aset</a></li>

                </ul>
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a class="btn btn-primary btn-lg btn-block btn-icon-split" href="{{ url("dashboard") }}">
                    <i class="fas fa-rocket"></i> Kembali ke E-Office
                </a>
            </div>
    </aside>
</div>
