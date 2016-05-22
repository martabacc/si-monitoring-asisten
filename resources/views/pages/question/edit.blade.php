@extends('layouts.boxed')

@section('title')
    Pertanyaan
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Pertanyaan</h1>
        @if(session('questionUpdated'))
            <br>
            <div class="alert alert-success">Question updated!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Pertanyaan</h3>
                    </div><!-- /.box-header -->
                    <form action="{{ route('question.update', $question->id) }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Pertanyaan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="question" class="form-control" value="{{ $question->question }}" required>
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

        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List jawaban</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        @if(session('optionAdded'))
                            <div class="alert alert-success">Option added!</div>
                        @endif
                        @if(session('optionDeleted'))
                            <div class="alert alert-danger">Option deleted!</div>
                        @endif
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class='col-md-1 text-center'>
                                    #
                                </th>
                                <th class=" text-center">
                                    Jawaban
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $option)
                            <tr>
                                <td class="text-center">{{ $option->id }}</td>
                                <td class="text-center">{{ $option->answer }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_option_{{ $option->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger" id="delete_option_{{ $option->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Jawaban</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('question.option.destroy', $option->id) }}", method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        {{ csrf_field() }}
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Ok!!</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <form action="{{ route('question.option.add', $question->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tambah jawaban</label>
                                <div class="col-sm-8">
                                    <input type="text" name="answer" class="form-control" value="{{ old('answer') }}" required>
                                    @if($errors->has('answer'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('answer') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-info pull-right">Tambah</button>
                            </div>
                        </form>
                    </div><!-- /.box-footer -->
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
