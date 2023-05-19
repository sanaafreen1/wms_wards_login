<style>
    p {

        margin-bottom: 0px;

    }
    .position-relative h6 {
        color:white;
    }
    .clr-white {
         color:white;
    }
    .dashboard-nav {
    background-color: #ffffff;
    z-index: 9999;
}
:is([data-layout=vertical], [data-layout=semibox])[data-sidebar=dark] .navbar-menu {
    background: #662e93 ;
    border-right: 1px solid var(--vz-vertical-menu-bg-dark)!important;
}
element.style {
}
.navbar-header {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin: 0 auto;
    height: 70px;
    background: #1766af!important;
    padding: 0 1.5rem 0 calc(1.5rem / 2);
}
.topbar-user {
    background-color: #1766af;
}
:is([data-layout=vertical], [data-layout=semibox])[data-sidebar=dark] .navbar-menu {
    background: #ffffff;
    border-right: 1px solid #3577f1!important;
}
:is([data-layout=vertical], [data-layout=semibox])[data-sidebar=dark] .navbar-nav .nav-link {
    color: #000;
}
:is([data-layout=vertical], [data-layout=semibox])[data-sidebar=dark] .navbar-nav .nav-link:hover {
    color: #1766af;
}
.navbar-brand-box {
    padding: 0 1.3rem;
    text-align: center;
    -webkit-transition: all .1s ease-out;
    transition: all .1s ease-out;
    border-bottom: 1px #1766af solid;
}
.table {
    font-size: 14px;
    line-height: 40px;
}
</style>





<header id="page-topbar">

    <div class="layout-width">

        <div class="navbar-header ">

            <div class="d-flex align-items-center">

                <!-- LOGO -->

                <div class="navbar-brand-box horizontal-logo">

                    <a href="{{ route('home') }}" class="logo logo-dark">

                        <span class="logo-sm">

                          <img src="{{url('assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" />

                        </span>

                        <span class="logo-lg">

                           <img src="{{url('assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" />

                        </span>

                    </a>



                    <a href="{{ route('home') }}" class="logo logo-light">

                        <span class="logo-sm">

                           <img src="{{url('assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" />

                        </span>

                        <span class="logo-lg">

                          <img src="{{url('assets/images/tslogo.png')}}" class="img-fluid" alt="" title="" />


                        </span>

                    </a>

                </div>



                <button  type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon" >

                    <span class="hamburger-icon" >

                        <span></span>

                        <span></span>

                        <span></span>

                    </span>

                </button>



                <!-- App Search-->

                <form class="app-search d-none d-md-block">

                    <div class="position-relative">

                        <!--<input type="text" class="form-control" placeholder="Search..." autocomplete="off"-->
                        <!--    id="search-options" value="">-->

                        <!--<span class="mdi mdi-magnify search-widget-icon"></span>-->

                        <!--<span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"-->
                        <!--    id="search-close-options"></span>-->
                       <h3 style="color:#fff;"> Telangana Wards Monitoring System </h3>

                    </div>

                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">

                        <div data-simplebar style="max-height: 320px;">

                            <!-- item-->

                            <div class="dropdown-header">

                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>

                            </div>



                            <div class="dropdown-item bg-transparent text-wrap">

                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">how to

                                    setup <i class="mdi mdi-magnify ms-1"></i></a>

                                <a href="index.html" class="btn btn-soft-secondary btn-sm btn-rounded">buttons

                                    <i class="mdi mdi-magnify ms-1"></i></a>

                            </div>

                            <!-- item-->

                            <div class="dropdown-header mt-2">

                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>

                            </div>



                            <!-- item-->

                            <a href="javascript:void(0);" class="dropdown-item notify-item">

                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>

                                <span>Analytics Dashboard</span>

                            </a>



                            <!-- item-->

                            <a href="javascript:void(0);" class="dropdown-item notify-item">

                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>

                                <span>Help Center</span>

                            </a>



                            <!-- item-->

                            <a href="javascript:void(0);" class="dropdown-item notify-item">

                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>

                                <span>My account settings</span>

                            </a>



                            <!-- item-->

                            <div class="dropdown-header mt-2">

                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>

                            </div>



                            <div class="notification-list">

                                <!-- item -->

                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">

                                    <div class="d-flex">

                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                        <div class="flex-1">

                                            <h6 class="m-0">Angela Bernier</h6>

                                            <span class="fs-11 mb-0 text-muted">Manager</span>

                                        </div>

                                    </div>

                                </a>

                                <!-- item -->

                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">

                                    <div class="d-flex">

                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                        <div class="flex-1">

                                            <h6 class="m-0">David Grasso</h6>

                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>

                                        </div>

                                    </div>

                                </a>

                                <!-- item -->

                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">

                                    <div class="d-flex">

                                        <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">

                                        <div class="flex-1">

                                            <h6 class="m-0">Mike Bunch</h6>

                                            <span class="fs-11 mb-0 text-muted">React Developer</span>

                                        </div>

                                    </div>

                                </a>

                            </div>

                        </div>



                        <div class="text-center pt-3 pb-1">

                            <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All

                                Results <i class="ri-arrow-right-line ms-1"></i></a>

                        </div>

                    </div>

                </form>

            </div>



            <div class="d-flex align-items-center">



                <div class="dropdown d-md-none topbar-head-dropdown header-item">

                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">

                        <i class="bx bx-search fs-22"></i>

                    </button>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">

                            <div class="form-group m-0">

                                <div class="input-group">

                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">

                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>







                <div class="ms-1 header-item d-none d-sm-flex">

                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">

                        <i class="bx bx-fullscreen fs-22"></i>

                    </button>

                </div>



                <div class="ms-1 header-item d-none d-sm-flex">

                    <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">

                        <i class="bx bx-moon fs-22"></i>

                    </button>

                </div>









                <div class="dropdown ms-sm-3 header-item topbar-user">

                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <span class="d-flex align-items-center">

                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/images/users/user-dummy-img.jpg') }}"
                                alt="Header Avatar">

                            <span class="text-start ms-xl-2">

                                <!--<span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Welcome:-->
                                <!--    Surveyor</span>-->
                                <div><small class="clr-white">Welcome</small>
                                        <p><b class="clr-white">{{Auth::user()->name}}</b></p>
                                    </div>



                            </span>

                        </span>

                    </button>



                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->



                        <a class="dropdown-item" href="{{ route('logout') }}" data-bs-toggle="modal"
                            data-bs-target="#logout-confirm"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" data-key="t-logout">Logout</span></a>



                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
