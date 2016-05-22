@extends('layouts.boxed')

@section('title')
    Pertanyaan
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Pertanyaan</h1>
        @if(session('questionAdded'))
            <br>
            <div class="alert alert-success">Question created!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Pertanyaan</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('question.store') }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Pertanyaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="question" class="form-control" value="{{ old('question') }}" required>
                                    @if($errors->has('question'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('question') }}</strong>
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
