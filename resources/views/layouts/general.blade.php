<!DOCTYPE html>
<html>
<head>
    @include('includes.head-general')
    @yield('custom_head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('includes.header2')
        <!-- sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">
                    @include('includes.sidebar')
            </section>
        </aside>
        <!-- content -->
        <div class="content-wrapper">
                @yield('content')
        </div>
    </div>
    @include('includes.footer2')

    @yield('custom_foot')
</body>
</html>
