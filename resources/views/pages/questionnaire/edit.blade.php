@extends('layouts.boxed')

@section('title')
    Kuisioner
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kuisioner</h1>
        @if(session('questionnaireUpdated'))
            <br>
            <div class="alert alert-success">Questionnaire updated!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Kuisioner</h3>
                        <a href="{{ route('questionnaire.question.view', $questionnaire->id) }}">
                            <button type="button" class="btn btn-success pull-right">
                                <span class="glyphicon glyphicon-list"></span> Lihat Kuisioner</button>
                        </a>
                    </div><!-- /.box-header -->
                    <form action="{{ route('questionnaire.update', $questionnaire->id) }}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Judul kuisoner</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" class="form-control" value="{{ $questionnaire->title }}" required>
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
                                    <input type="text" name="description" class="form-control" value="{{ $questionnaire->description }}" required>
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

        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List pertanyaan</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        @if(session('questionAdded'))
                            <div class="alert alert-success">Question added!</div>
                        @endif
                        @if(session('questionDeleted'))
                            <div class="alert alert-danger">Question deleted!</div>
                        @endif
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class='col-md-1 text-center'>
                                    #
                                </th>
                                <th class=" text-center">
                                    Pertanyaan
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td class="text-center">{{ $question->id }}</td>
                                <td class="text-center">{{ $question->question }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_question_{{ $question->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger" id="delete_question_{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                    <form action="{{ route('questionnaire.question.destroy', [$questionnaire->id, $question->id]) }}", method="post">
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
                        <form action="{{ route('questionnaire.question.add', $questionnaire->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Tambah pertanyaan</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" name="question">
                                        @foreach($question_list as $question)
                                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('question'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('question') }}</strong>
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
