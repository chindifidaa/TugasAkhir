<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="">
            <img src="{{ asset('assets/img/logo-2.png')}}" class="logo-icon-2" alt="" />
        </div>
        <div>
            <h4 class="logo-text">Homestay</h4>
        </div>
        <a href="#" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="menu-label">Menu</li>
        <li class="{{ request()->is('apps/dashboard*') ? 'mm-active' : '' }}">
            <a href="{{ route('apps.dashboard')}}">
                <div class="parent-icon"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Beranda</div>
            </a>
        </li>
        <li class="{{ request()->is('apps/fgasfas*') ? 'mm-active' : '' }}">
            <a href="emailbox.html">
                <div class="parent-icon"><i class="bx bx-calendar-event"></i>
                </div>
                <div class="menu-title">Reservasi</div>
            </a>
        </li>
        <li class="{{ request()->is('apps/fgasfas*') ? 'mm-active' : '' }}">
            <a href="emailbox.html">
                <div class="parent-icon"><i class="bx bx-history"></i>
                </div>
                <div class="menu-title">Riwayat</div>
            </a>
        </li>
        <li class="menu-label">Homestay</li>
        <li class="{{ request()->is('apps/rooms*') ? 'mm-active' : '' }}">
            <a href="{{ route('apps.rooms')}}">
                <div class="parent-icon"><i class="bx bx-book-content"></i>
                </div>
                <div class="menu-title">Kamar</div>
            </a>
        </li>
        <li class="{{ request()->is('apps/galleries*') ? 'mm-active' : '' }}">
            <a href="{{ route('apps.gallery')}}">
                <div class="parent-icon "><i class="bx bx-image"></i>
                </div>
                <div class="menu-title">Galeri</div>
            </a>
        </li>
        <li class="{{ request()->is('apps/destinations*') ? 'mm-active' : '' }}">
            <a href="{{ route('apps.destination')}}">
                <div class="parent-icon "><i class="bx bx-landscape"></i>
                </div>
                <div class="menu-title">Destinasi</div>
            </a>
        </li>
        <li>
            <a href="chat-box.html">
                <div class="parent-icon "><i class="bx bx-spreadsheet"></i>
                </div>
                <div class="menu-title">Fasilitas</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">Master Data</div>
            </a>
            <ul>
                <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Jenis Fasilitas</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Jenis Kamar</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Jenis Pembayaran</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">Pengaturan</li>
        <li class="{{ request()->is('apps/users*') ? 'mm-active' : '' }}">
            <a href="{{ route('apps.users')}}">
                <div class="parent-icon "><i class="bx bx-group"></i>
                </div>
                <div class="menu-title">Pengguna</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
