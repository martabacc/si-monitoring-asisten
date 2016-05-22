@extends('layouts.boxed')

@section('title')
    Praktikan
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 403</h2>

            <div class="error-content">
                <br>
                <br>
                <h3><i class="fa fa-warning text-yellow"></i> Oops! You're not Authorized.</h3>

                <p>
                    I'm sorry but you're not authorized to this page
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>

@stop
@section('custom_foot')
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){

            $(".select2").select2();
        });
    </script>
@stop
