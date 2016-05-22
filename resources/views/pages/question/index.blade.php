@extends('layouts.boxed')

@section('title')
    Pertanyaan
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1> Pertanyaan </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('question.create') }}" class="btn btn-primary" title="Tambah">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                </a>
            </div>
        </div>
        <br>
        @if (session('quetionDeleted'))
            <div class="alert alert-danger">Question removed!</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Pertanyaan</h3>
                    </div>
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class='col-md-1 text-center'>
                                    #
                                </th>
                                <th class=" text-center">
                                    Pertanyaan
                                </th>
                                <th class="col-md-2">
                                    Dibuat tanggal
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
                                <td class="text-center">{{ $question->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('question.edit', $question->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_question_{{ $question->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger" id="delete_question_{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Pertanyaan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('question.destroy', $question->user_id) }}", method="post">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('foot')

    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script event="text/javascript">
        $(document).ready(function(){
//              pagination
            $('#table-event').DataTable({
                "paging": true,
                "searching": true
            });
            $('#flash-overlay-modal').modal();
        });
    </script>
@endsection
