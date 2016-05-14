<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('assets/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
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
                    <i class="fa fa-users"></i> <span>Praktikum dan Sesilab</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('schedule') }}"><i class="fa fa-list"></i> Lihat Jadwal </a></li>
                    <li><a href="{{ url('schedule/add') }}"><i class="fa fa-plus"></i> Tambah Jadwal </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Kehadiran & Nilai </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('presence') }}"><i class="fa fa-list"></i> Lihat Kehadiran </a></li>
                    <li><a href="{{ url('presence/create') }}"><i class="fa fa-plus"></i> Tambah Data Kehadiran </a></li>
                    <li><a href="{{ url('mark') }}"><i class="fa fa-plus"></i> Lihat Nilai </a></li>
                    <li><a href="{{ url('mark/create') }}"><i class="fa fa-plus"></i> Tambah Data Nilai </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Kuisioner </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('question') }}"><i class="fa fa-list"></i> Lihat Pertanyaan </a></li>
                    <li><a href="{{ url('question/create') }}"><i class="fa fa-list"></i> Tambah Pertanyaan </a></li>
                    <li><a href="{{ url('questionnaire') }}"><i class="fa fa-list"></i> Lihat Kuisioner </a></li>
                    <li><a href="{{ url('questionnaire/result') }}"><i class="fa fa-list"></i> Hasil Kuisioner </a></li>
                    <li><a href="{{ url('questionnaire/create') }}"><i class="fa fa-plus"></i> Tambah Kuisioner </a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Kelas </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('class') }}"><i class="fa fa-list"></i> Lihat Kelas </a></li>
                    <li><a href="{{ url('class/create') }}"><i class="fa fa-plus"></i> Tambah Kelas </a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Mata Kuliah </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('subject') }}">
                        <i class="fa fa-list"></i> Lihat Mata Kuliah </a>
                    </li>
                    <li><a href="{{ url('subject/create') }}">
                        <i class="fa fa-plus"></i> Tambah Mata Kuliah </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Laporan Kegiatan </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('report') }}">
                        <i class="fa fa-list"></i> Lihat Laporan </a>
                    </li>
                    <li><a href="{{ url('report/create') }}">
                        <i class="fa fa-plus"></i> Tambah Laporan </a>
                    </li>
                </ul>
            </li>

            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> Laporan Kendala </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('activity') }}"><i class="fa fa-list"></i> Lihat Laporan </a></li>
                    <li><a href="{{ url('activity/create') }}"><i class="fa fa-plus"></i> Tambah Laporan</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> User </span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('user') }}"><i class="fa fa-list"></i> Lihat User </a></li>
                    <li><a href="{{ url('user/create') }}"><i class="fa fa-plus"></i> Tambah User</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
