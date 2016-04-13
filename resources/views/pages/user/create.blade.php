@extends('layouts.boxed')

@section('title')
    Tambah User
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>User</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah User</h3>
                        @if(Session::has('userAdded'))
                            <h3 class="box box-success">Ok</h3>
                        @endif
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('user.store') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                                    @if($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                    @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" required>
                                    @if($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
