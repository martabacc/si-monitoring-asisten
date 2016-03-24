<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('adminlte-2.3.0/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">All Navigations</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Menu 1</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('design') }}"><i class="fa fa-list"></i> List Desain </a></li>
                    <li><a href="{{ url('design/create') }}"><i class="fa fa-plus"></i> Tambah Desain  </a></li>
                    <li><a href="{{ url('design/my') }}"><i class="fa fa-plus"></i> Desain Saya </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Menu 2 </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('designer') }}"><i class="fa fa-list"></i> List Desainer</a></li>
                    <li><a href="{{ url('designer/add') }}"><i class="fa fa-plus"></i> Tambah Designer </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Menu 3 </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('order') }}"><i class="fa fa-list"></i> Daftar Pesanan</a></li>
                    <li><a href="{{ url('order/recaps') }}"><i class="fa fa-plus"></i> Rekapitulasi</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Menu 4 </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('customer') }}"><i class="fa fa-list"></i> List Customer</a></li>
                    <li><a href="{{ url('customer/add') }}"><i class="fa fa-plus"></i> Tambah Customer </a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Menu 5 </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('founder') }}"><i class="fa fa-list"></i> List Founder</a></li>
                    <li><a href="{{ url('founder/create') }}"><i class="fa fa-plus"></i> Tambah</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
