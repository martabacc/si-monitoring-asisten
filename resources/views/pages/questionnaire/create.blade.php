@extends('layouts.boxed')

@section('title')
    Kuisioner
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kuisioner</h1>
        @if(session('questionnaireAdded'))
            <br>
            <div class="alert alert-success">Questionnaire created!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kuisioner</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('questionnaire.store') }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Judul kuisoner</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                                    @if($errors->has('title'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                                    @if($errors->has('description'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('description') }}</strong>
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
