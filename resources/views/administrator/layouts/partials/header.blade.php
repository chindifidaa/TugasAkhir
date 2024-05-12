<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                <div class="input-group-prepend search-arrow-back">
                    <button class="btn btn-search-back" type="button"><i class="bx bx-arrow-back"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">8 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
                                            ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-warning text-warning"><i class="bx bx-message-detail"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Comments <span class="msg-time float-right">4 hrs
                                            ago</span></h6>
                                        <p class="msg-info">New customer comments recived</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-mehandi text-mehandi"><i class='bx bx-door-open'></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-right">2 weeks
                                            ago</span></h6>
                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ ucfirst(auth()->user()->name) }}</p>
                                <p class="designattion mb-0">{{ ucfirst(auth()->user()->role->name)}}</p>
                            </div>
                            <img src="{{ asset('storage/images/users/'. auth()->user()->image )}}" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item" href="{{ route('apps.logout')}}"><i class="bx bx-power-off"></i><span>Logout</span></a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>
