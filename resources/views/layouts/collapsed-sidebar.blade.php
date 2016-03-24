<!DOCTYPE html>
<html>
    <head>
        @include('partials.head')
        @yield('head')
    </head>
    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
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
