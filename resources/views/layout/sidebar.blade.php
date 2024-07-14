<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg/483px-Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg.png"
            alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DISKOMINFO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/beranda') }}" class="nav-link {{ request()->is('beranda') ? 'active' : '' }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/pengaturan') }}" class="nav-link {{ request()->is('pengaturan') ? 'active' : '' }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/program') }}" class="nav-link {{ request()->is('program') ? 'active' : '' }}"
                                class="nav-link">

                                <i class="fas fa-file nav-icon"></i>
                                <p>Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kegiatan') }}" class="nav-link {{ request()->is('kegiatan') ? 'active' : '' }}"
                                class="nav-link">

                                <i class="fas fa-file nav-icon"></i>
                                <p>Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/sub_kegiatan') }}"
                                class="nav-link {{ request()->is('sub_kegiatan') ? 'active' : '' }}" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Sub Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-grip-horizontal"></i>
                        <p>
                            Indikator
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('indikator_program') }}"
                                class="nav-link {{ request()->is('indikator_program') ? 'active' : '' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Program</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/indikator_kegiatan') }}"
                                class="nav-link {{ request()->is('indikator_program') ? 'active' : '' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/indikator_kinerja') }}"
                                class="nav-link {{ request()->is('indikator_kinerja') ? 'active' : '' }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/realisasi') }}" class="nav-link {{ request()->is('realisasi') ? 'active' : '' }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Realisasi Anggaran
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            IKU
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/sub_iku') }}" class="nav-link {{ request()->is('sub_iku') ? 'active' : '' }}"
                                class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Sub IKU A</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sub_iku.realisasi') }}"
                                class="nav-link {{ request()->is('sub_iku/realisasi') ? 'active' : '' }}" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Realisasi IKU B</p>
                            </a>
                        </li>
                    </ul>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
