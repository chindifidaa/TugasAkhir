 <!-- Header Section Begin -->
 <header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> (12) 345 67890</li>
                        <li><i class="fa fa-envelope"></i> Pesonajavaijenhomestay@gmail.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="{{ route('histories')}}" class="bk-btn">Riwayat Pemesanan</a>
                        <div class="login-option">
                            <i class="fa fa-user-circle"></i>
                            <span><i class="fa fa-angle-down"></i></span>
                            <div class="login-dropdown">
                                <ul>
                                    @if (!auth()->check())
                                        <li><a href="{{ route('login')}}">Masuk</a></li>
                                    @else
                                        <li><a href="#">Keluar</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="{{ route('home')}}">
                            <img src="{{ asset('main-assets/image/logo/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="{{ (request()->is('/*')) ? 'active' : '' }}"><a href="{{ route('home')}}">Home</a></li>
                                <li class="{{ (request()->is('rooms*')) ? 'active' : '' }}"><a href="{{ route('rooms')}}">Room</a></li>
                                <li class="{{ (request()->is('destinations*')) ? 'active' : '' }}"><a href="{{ route('destinations')}}">Destinasi</a></li>
                                <li class="{{ (request()->is('galleries*')) ? 'active' : '' }}"><a href="{{ route('galleries')}}">Galeri</a></li>
                                <li class="{{ (request()->is('contacts*')) ? 'active' : '' }}"><a href="{{ route('contacts')}}">Kontak</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
