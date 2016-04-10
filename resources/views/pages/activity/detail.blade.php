@extends('layouts.boxed')

@section('title')
    Laporan Aktivitas
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Laporan Aktivitas</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Laporan Aktivitas</h3>
                    </div><!-- /.box-header -->
                    {{--todo hanya di tampilan desainer--}}
                            <!-- form start -->
                    {{--Note : Assistant ID dapat dari authentikasi--}}

                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td class='col-md-3 text-center'>
                                        <strong>Judul Laporan </strong>
                                    </td>
                                    <td>
                                        Asistensi kelas A
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-md-1 text-center'>
                                        <strong>Kehadiran </strong>
                                    </td>
                                    <td>
                                        30 orang
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-md-2 text-center'>
                                        <strong>Dilaporkan Oleh </strong>
                                    </td>
                                    <td>
                                        John Doe
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-md-2 text-center'>
                                        <strong>Catatan </strong>
                                    </td>
                                    <td>
                                        Asistensinya gabut Pak
                                    </td>
                                </tr>
                                <tr>
                                    <td class='col-md-2 text-center'> 
                                        <strong>Dilaporkan pada </strong>
                                    </td>
                                    <td>
                                        januari 1900
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <div>

                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
    </section>


@stop
@section('custom_foot')
    <script type="text/javascript">
        $(function(){
        });
    </script>
@stop
