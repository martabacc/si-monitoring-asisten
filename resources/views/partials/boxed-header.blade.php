<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                {{Auth::user()->name}}
                                <small>Login sebagai : @if(session('role')==0)
                                        Administrator
                                    @elseif(session('role')==1)
                                        Dosen
                                    @elseif(session('role')==2)
                                        Asisten
                                    @elseif(session('role')==3)
                                        Praktikan
                                    @endif</small>
                            </p>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('logout') }}" class=" dropdown-toggle btn btn-info small">Log Out</a>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i>  Lihat Website Sebagai</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
