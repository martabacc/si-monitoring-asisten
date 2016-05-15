@extends('layouts.boxed')

@section('title')
    Role
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Role</h1>
    @if(session('activityAdded'))
            <br>
            <div class="alert alert-success">Role Changed!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Role</h3>
                    </div><!-- /.box-header -->
                    <form action="" method="post" class="form-horizontal">
                        <div class="box-body">

                        <div class="form-group{{ $errors->has('usernames') ? ' has-error' : '' }}">
                            <label for="notes" class="col-sm-3 control-label">Username </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" rows="9" name="usernames" required>{{ old('notes') }}</textarea>
                                @if($errors->has('usernames'))
                                    <span class="text-danger">
                                            <strong>{{ $errors->first('usernames') }}</strong>
                                        </span>
                                @endif
                                <span class="text-default">
                                            <strong>Masukkan username , pisahkan setiap username dengan enter</strong>
                                        </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="classes" class="col-sm-3 control-label">Role</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="class_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
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
