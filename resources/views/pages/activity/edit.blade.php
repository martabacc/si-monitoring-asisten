@extends('layouts.boxed')

@section('title')
    Laporan Aktivitas
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Laporan Aktivitas</h1>
        @if(session('activityUpdated'))
            <br>
            <div class="alert alert-success">Activity updated!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Laporan Aktivitas</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('activity.update', $activity->id) }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Judul Laporan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" value="{{ $activity->name }}" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('classes') ? ' has-error' : '' }}">
                                <label for="classes" class="col-sm-3 control-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="class_id">
                                        @foreach($classes as $kelas)
                                            <option value="{{ $kelas->id }}" {{ $activity->class_id == $kelas->id ? 'selected' : ''}}>{{ $kelas->subject->name.'-'.$kelas->class  }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('classes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('classes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" name="date" class="form-control" value="{{ $activity->date }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Durasi</label>
                                <div class="col-sm-8">
                                    <input type="number" name="duration" class="form-control" value="{{ $activity->duration }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Catatan </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="notes" required>{{ $activity->notes }}</textarea>
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
