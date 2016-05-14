@extends('layouts.boxed')

@section('title')
    Kelas
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kelas</h1>
        @if(session('classUpdated'))
            <br>
            <div class="alert alert-success">Class updated!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Edit Kelas</h3>
                    <form action="{{ route('class.update', $class->id) }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Mata Kuliah</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="subject_id">
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ $subject->id == $class->id ? 'selected' : ''}}>{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('subject_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Kelas</label>
                                <div class="col-sm-8">
                                    <input type="text" name="class" class="form-control" value="{{ $class->class }}" required>
                                    @if($errors->has('class'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('class') }}</strong>
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
    <script src="{{ url('plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
        });
    </script>
@stop
