@extends('layouts.boxed')

@section('title')
    Nilai
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Nilai</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Nilai</h3>
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
                                    <strong>Diupload tanggal</strong>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td class='col-md-2 text-center'>
                                    <strong> File Nilai </strong>
                                </td>
                                <td>
                                    <a href="{{ url('/') }}">Nama file</a>
                                    {{--todo--}}
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
