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
                                    <strong> Kegiatan </strong>
                                </td>
                                <td>
                                    Asistensi kelas A
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Urgensitas</strong>
                                </td>
                                <td>
                                    <span class="label label-warning">Penting</span>
                                    <span class="label label-danger">Biasa</span>
                                    <span class="label label-success">Medium</span>
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Deskripsi </strong>
                                </td>
                                <td>
                                    Praktikannya kejebak macet semua pak, jadi libur deh
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Solusi </strong>
                                </td>
                                <td>
                                    Dihajar semua yang bikin macet pak
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Detail Laporan </strong>
                                </td>
                                <td>
                                    Dilaporkan oleh John Doe
                                    Pada Januari 1900
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
