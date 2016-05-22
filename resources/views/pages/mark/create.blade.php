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
                        <h3 class="box-title">Tambah Laporan Nilai</h3>
                    </div>


                    @if (session('markAdded'))
                        <div class="alert alert-success">Mark Added!</div>
                    @endif

                    <form action="{{ route('mark.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Aktivitas</label>
                                <div class="col-sm-8">

                                    <select class="form-control" name="activity">
                                        @foreach($activities as $act)
                                            <option value="{{ $act->id }}">{{ $act->name .'-'. $act->classes->name }}</option>
                                        @endforeach
                                        @if($errors->has('classes'))
                                            <span class="text-danger">
                                            <strong>{{ $errors->first('classes') }}</strong>
                                        </span>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">File Nilai </label>
                                <div class="col-sm-8">
                                    <input type="file" name="path_file" id="exampleInputFile">
                                    <span class="text-warning">
                                        File excel yang berisi nilai.
                                    </span>
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
