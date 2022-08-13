<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown d-none d-lg-block">
            <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('')}}assets/images/flags/us.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('')}}assets/images/flags/germany.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">German</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('')}}assets/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('')}}assets/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{asset('')}}assets/images/flags/russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                </a>
            </div>
        </li>

        <li class="dropdown notification-list d-none d-md-inline-block">
            <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                <i class="mdi mdi-crop-free noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="font-16 m-0">
                        <span class="float-right">
                            <a href="#" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="slimscroll noti-scroll">
        
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <i class="fa fa-user-plus text-info"></i>
                        </div>
                        <p class="notify-details">New user registered
                            <small class="noti-time">You have 10 unread messages</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-success">
                            <i class="far fa-gem text-primary"></i>
                        </div>
                        <p class="notify-details">New settings
                            <small class="noti-time">There are new settings available</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon text-danger">
                            <i class="far fa-bell text-danger"></i>
                        </div>
                        <p class="notify-details">Updates
                            <small class="noti-time">There are 2 new updates available</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center notify-item notify-all">
                        See all notifications
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('')}}assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-face-profile"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-power-settings"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-settings-outline noti-icon"></i>
            </a>
        </li>


    </ul>

    <!-- LOGO -->
    <div class="logo-box">
            <a href="index-2.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{asset('')}}assets/images/logo-dark.png" alt="" height="16">
                    <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-dark">M</span> -->
                    <img src="{{asset('')}}assets/images/logo-sm.png" alt="" height="25">
                </span>
            </a>

            <a href="index-2.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{asset('')}}assets/images/logo-light.png" alt="" height="16">
                    <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-dark">M</span> -->
                    <img src="{{asset('')}}assets/images/logo-sm.png" alt="" height="25">
                </span>
            </a>
        </div>

    <!-- LOGO -->


    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

        <li class="d-none d-sm-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
    </ul>
</div>
<!-- end Topbar -->