            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.index') }}" class="waves-effect"><i class="mdi mdi-account"></i><span> Akun </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.pengaduan.index') }}" class="waves-effect"><i class="fa fa-volume-up"></i><span> Pengaduan </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.artikel.index') }}" class="waves-effect"><i class="mdi mdi-newspaper"></i><span> Artikel </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.quotes.index') }}" class="waves-effect"><i class="fa fa-quote-left"></i><span> Quote </span></a>
                            </li>
                            <li>
                                <a href="{{ route('admin.setting.index') }}" class="waves-effect"><i class="fas fa-cog"></i><span> Pengaturan </span></a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->