@extends('layouts.boxed')

@section('title')
    Tambah Laporan Aktivitas
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
                        <h3 class="box-title">Tambah Laporan Aktivitas</h3>
                    </div><!-- /.box-header -->
                    {{--todo hanya di tampilan desainer--}}
                            <!-- form start -->
                    {{--Note : Assistant ID dapat dari authentikasi--}}
                    <form action="" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Aktivitas</label>
                                <div class="col-sm-8">
                                    {{--todo change it into authenticated user--}}
                                    <input type="text" name="name" class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Durasi </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="duration" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                    <label> Centang jika sudah terverifikasi </label>
                                </div>
                            </div>


                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-info pull-right">Tambah Aktivitas</button>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
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
