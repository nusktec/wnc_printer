<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * nav.php
 * 2:05 AM | 2019 | 12
 **/
?>
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo-->
            <div>
                <a href="<? echo base_url(); ?>" class="logo">
                            <span class="logo-light">
                                    <i class="mdi mdi-lan-connect"></i> <? echo APP_NAME ?>
                            </span>
                </a>
            </div>
            <!-- End Logo-->

            <div class="menu-extras topbar-custom navbar p-0">
                <ul class="list-inline mb-0 d-none">
                    <li class="hide-phone app-search float-left">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <input type="text" class="form-control" placeholder="Search user">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                </ul>

                <ul class="navbar-right ml-auto list-inline float-right mb-0">
                    <!-- language-->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<? echo base_url(); ?>assets/images/flags/us_flag.jpg" class="mr-2" height="12"
                                 alt=""/> English
                            <span class="mdi mdi-chevron-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                            <a class="dropdown-item" href="#"><img
                                        src="<? echo base_url(); ?>assets/images/flags/french_flag.jpg" alt=""
                                        height="16"/><span> English </span></a>
                        </div>
                    </li>

                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="<? echo base_url('logout'); ?>" id="btn-fullscreen">
                            <i class="mdi mdi-logout noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list list-inline-item d-none">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                               role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock
                                    screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<? echo base_url('logout'); ?>"><i
                                            class="mdi mdi-power text-danger"></i> Logout</a>
                            </div>
                        </div>
                    </li>

                    <li class="menu-item dropdown notification-list list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>

            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div>
        <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">

            <div id="navigation">

                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li>
                        <a href="<? echo base_url(); ?>"><i class="icon-accelerator"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<? echo base_url("admin/users"); ?>"><i class="icon-wine"></i> Users</a>
                    </li>
                    <li>
                        <a href="<? echo base_url("admin/pac"); ?>"><i class="icon-ticket"></i>Manage PAC</a>
                    </li>
                </ul>
                <!--End navigation menu-->
            </div>
            <?
            if (@$error) {
                ?>
                <div class="alert <? echo @$error['type']; ?> alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <? echo @$error['message']; ?>
                </div>
                <?
            }
            ?>
            <!--end #navigation -->
        </div>
        <!--end container-->
    </div>
    <!--end navbar - custom-->
</header>
