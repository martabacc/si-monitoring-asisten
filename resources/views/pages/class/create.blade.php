@extends('layouts.boxed')

@section('title')
    Kelas
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kelas</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kelas</h3>
                    </div><!-- /.box-header -->
                    {{--todo hanya di tampilan desainer--}}
                            <!-- form start -->
                    {{--Note : Assistant ID dapat dari authentikasi--}}
                    <form action="{{ route('class.store') }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Mata Kuliah</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="subject_id">
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}"> {{$subject->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Kelas</label>
                                <div class="col-sm-8">
                                    {{--todo change it into authenticated user--}}
                                    <input type="text" name="class" class="form-control"
                                           required>
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
    <script src="{{ url('assets/adminlte/plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
        });
    </script>
@stop
