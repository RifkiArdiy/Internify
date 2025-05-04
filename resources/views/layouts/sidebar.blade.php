<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu">
                <em class="icon ni ni-menu"></em>
            </a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('assets/images/logo.png') }}"
                    srcset="{{ asset('assets/images/logo2x.png 2x') }}" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('assets/images/logo-dark.png') }}"
                    srcset="{{ asset('assets/images/logo-dark2x.png 2x') }}" alt="logo-dark">
            </a>
        </div>
    </div>
    <!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-dashlite"></em>
                            </span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Pages</h6>
                    </li>
                    <!-- .nk-menu-heading -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-users"></em>
                            </span>
                            <span class="nk-menu-text">User Manage</span>
                        </a>
                        <!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href={{ url('/companies') }} class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-building"></em>
                            </span>
                            <span class="nk-menu-text">Companies</span>
                        </a>
                        <!-- .nk-menu-sub -->
                    </li>
                    <!-- .nk-menu-item -->
                </ul>
                <!-- .nk-menu -->
            </div>
            <!-- .nk-sidebar-menu -->
        </div>
        <!-- .nk-sidebar-content -->
    </div>
    <!-- .nk-sidebar-element -->
</div>
