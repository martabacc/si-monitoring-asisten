@extends('layouts.boxed')

@section('title')
    Laporan Kendala
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Laporan Kendala</h1>
        @if(session('issueAdded'))
            <br>
            <div class="alert alert-success">Issue added!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Laporan Kendala</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('issue.store') }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}

                            <input type="hidden" name="assistant_id" value="{{ \Auth::user()->id }}">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Aktivitas</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="activity_id">
                                        @foreach($activities as $activity)
                                            <option value="{{ $activity->id }}">{{ $activity->name.' '.$activity->classes->subject->name.'-'.$activity->classes->class }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('activity_id'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('activity_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Problem </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="problem" required>{{ old('problem') }}</textarea>
                                    @if($errors->has('problem'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('problem') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Urgensitas</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="urgency">
                                        <option value="0">Normal</option>
                                        <option value="1">Penting</option>
                                        <option value="2">Solved</option>
                                    </select>
                                    @if($errors->has('urgency'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('urgency') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Solusi </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="3" name="solution">{{ old('solution') }}</textarea>
                                    @if($errors->has('solution'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('solution') }}</strong>
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
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){

            $(".select2").select2();
        });
    </script>
@stop
