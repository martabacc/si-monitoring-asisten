@extends('layouts.boxed')

@section('title')
    Laporan Aktivitas
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Laporan Aktivitas</h1>
        @if(session('activityAdded'))
            <br>
            <div class="alert alert-success">Activity added!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Laporan Aktivitas</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('activity.store') }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-3 control-label">Judul Laporan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('classes') ? ' has-error' : '' }}">
                                <label for="classes" class="col-sm-3 control-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="class_id">
                                        @foreach($classes as $kelas)
                                            <option value="{{ $kelas->id }}">{{ $kelas->subject->name.'-'.$kelas->class  }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('classes'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('classes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
                                    @if($errors->has('date'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="col-sm-3 control-label">Durasi</label>
                                <div class="col-sm-8">
                                    <input type="number" name="duration" class="form-control" value="{{ old('duration') }}" required>
                                    @if($errors->has('duration'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="col-sm-3 control-label">Catatan </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="notes" required>{{ old('notes') }}</textarea>
                                    @if($errors->has('notes'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif
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
    <script type="text/javascript">
        $(function(){
        });
    </script>
@stop
