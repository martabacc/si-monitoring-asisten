@extends('layouts.boxed')

@section('title')
    Asisten
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1> Asisten </h1>
    </section>
    <section class="content">
        @if (session('assistantsDeleted'))
            <div class="alert alert-danger">Assistant deleted!</div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <div class="box ">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Asisten - {{ $class->subject->name.'-'.$class->class }}</h3>
                    </div>
                        <table class="table table-striped table-hover table-bordered " id="table-event">
                            <thead>
                            <tr>
                                <th class='col-md-1 text-center'>
                                    #
                                </th>
                                <th class="col-md-5 text-center">
                                    Username
                                </th>
                                <th class="col-md-3 text-center">
                                    Name
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($assistants as $assistant)
                            <tr>
                                <td class="text-center">{{ $assistant->user->id }}</td>
                                <td class="text-center">{{ $assistant->user->username }}</td>
                                <td class="text-center">{{ $assistant->user->name }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_assistant_{{ $assistant->user->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger" id="delete_assistant_{{ $assistant->user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Asisten</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('class.assistant.destroy', [$class->id, $assistant->user->id]) }}", method="post">
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
