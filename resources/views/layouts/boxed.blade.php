<!DOCTYPE html>
<html>
    <head>
        @include('includes.head-general')
        @yield('head')

        <title>
            @yield('title')
        </title>
    </head>
    <body class="hold-transition skin-blue layout-boxed sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            @include('partials.boxed-header')

             @include('partials.sidebar')

            @include('partials.delete-modal')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('content-header')
                </section>

                <!-- Main content -->
                <section class="content">
                    {{-- @include('flash::message') --}}
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('partials.footer')

            @include('partials.control-sidebar')
        </div><!-- ./wrapper -->

        @include('partials.foot')
        @yield('foot')
    </body>
</html>
