<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ url('/storage/header-image/logo-light-sm.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ url('/storage/header-image/logo-light-lg.png') }}" alt="" height="25">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ url('/storage/header-image/logo-light-sm.png') }}" alt="" height="25">
            </span>
            <span class="logo-lg">
                <img src="{{ url('/storage/header-image/logo-light-lg.png') }}" alt="" height="25">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}"
                        data-key="t-analytics">
                        <i class="ri-add-box-fill"></i> <span data-key="t-multi-level">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/services" class="nav-link {{ Request::is('services*') ? 'active' : '' }}"
                        data-key="t-analytics">
                        <i class="ri-archive-line"></i> <span data-key="t-multi-level">Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/portfolio" class="nav-link {{ Request::is('portfolio*') ? 'active' : '' }}"
                        data-key="t-analytics">
                        <i class="ri-alarm-warning-line"></i> <span data-key="t-multi-level">Portofolio</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('*') ? 'active' : '' }}" data-key="t-analytics">
                        <i class="ri-exchange-dollar-line"></i> <span data-key="t-multi-level">Price</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/testimoni" class="nav-link {{ Request::is('testimoni*') ? 'active' : '' }}"
                        data-key="t-analytics">
                        <i class="ri-double-quotes-l"></i> <span data-key="t-multi-level">Testimoni</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Landing Page MT</span></li>
                <li class="nav-item">
                    <a href="/landingpage" class="nav-link {{ Request::is('landingpage*') ? 'active' : '' }}"
                        data-key="t-analytics">
                        <i class="ri-send-plane-2-line"></i> <span data-key="t-multi-level">Landing Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>