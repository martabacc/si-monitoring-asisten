@extends('layouts.boxed')

@section('title')
    Jadwal
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Jadwal</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Kuisioner</h3>
                    </div><!-- /.box-header -->
                    {{--todo hanya di tampilan desainer--}}
                            <!-- form start -->
                    {{--Note : Assistant ID dapat dari authentikasi--}}

                    <div class="box-body">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td class='col-md-3 text-center'>
                                    <strong> Nama Jadwal </strong>
                                </td>
                                <td>
                                    Sesilab Kelas A
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Kelas</strong>
                                </td>
                                <td>
                                    Struktur Data A
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Jadwal</strong>
                                </td>
                                <td>
                                    Setiap Hari Kamis
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Lokasi</strong>
                                </td>
                                <td>
                                    LP2
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong> Dibuat pada </strong>
                                </td>
                                <td>
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
