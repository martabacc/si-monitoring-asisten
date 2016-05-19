@extends('layouts.boxed')

@section('title')
    Jadwal
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Edit Jadwal</h1>
        @if(session('scheduleUpdated'))
            <br>
            <div class="alert alert-success">Schedule updated!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-10">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Jadwal</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('schedule.update', $schedule->id) }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="class_id" data-placeholder="Masukkan kelas">
                                        @foreach($classes as $kelas)
                                            <option value="{{ $kelas->id }}" {{ $kelas->id == $schedule->class_id ? 'selected' : '' }}>{{ $kelas->subject->name.' - '.$kelas->class }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('class_id'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('class_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ $schedule->name }}" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Hari</label>
                                <div class="col-sm-8">
                                    <input type="text" name="day" class="form-control" value="{{ $schedule->day }}" required>
                                    @if($errors->has('day'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('day') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Waktu</label>
                                <div class="col-sm-8">
                                    <input type="text" name="schedule" class="form-control" value="{{ $schedule->schedule }}" required>
                                    @if($errors->has('schedule'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('schedule') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tempat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="place" class="form-control" value="{{ $schedule->place }}" required>
                                    @if($errors->has('place'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('place') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-3 pull-right">
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
