@extends('layouts.boxed')

@section('title')
    Mata Kuliah
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Mata Kuliah</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Mata Kuliah</h3>
                    </div><!-- /.box-header -->
                    {{--todo hanya di tampilan desainer--}}
                            <!-- form start -->
                    {{--Note : Assistant ID dapat dari authentikasi--}}
                    <form action="" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="description" required></textarea>
                                </div>
                            </div>

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-info pull-right">Submit</button>
                            </div>
                        </div><!-- /.box-footer -->
                    </form>
                </div><!-- /.box -->
            </div><!-- /.box -->
        </div>
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
