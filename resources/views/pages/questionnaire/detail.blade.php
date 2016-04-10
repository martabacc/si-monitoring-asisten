@extends('layouts.boxed')

@section('title')
    Kuisioner
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kuisioner</h1>
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
                                    <strong> Judul Kuisioner </strong>
                                </td>
                                <td>
                                    Apakah Kamu Baik?
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Deskripsi</strong>
                                </td>
                                <td>
                                    Menerangkan apakah kamu baik?
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
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>Banyak Pertanyaan</strong>
                                </td>
                                <td>
                                    10
                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong>List Pertanyaan</strong>
                                </td>
                                <td>
                                    <ol>
                                        <li class="item1"><a href="">Apakah kamu baik?</a></li>
                                        <li class="item2"><a href="">Apakah kamu baik?</a></li>
                                        <li class="item3"><a href="">Apakah kamu baik?</a></li>
                                        <li class="item4"><a href="">Apakah kamu baik?</a></li>
                                    </ol>
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
