@extends('layouts.boxed')

@section('title')
    Laporan Aktivitas
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1> Laporan Aktivitas </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('activity.create') }}" class="btn btn-primary" title="Tambah">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                </a>
            </div>
        </div>
        <br>
        @if (session('activityDeleted'))
            <div class="alert alert-danger">Activity deleted!</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Laporan Aktivitas</h3>
                    </div>
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class='col-md-1 text-center'>
                                    ID
                                </th>
                                <th class="col-md-2 text-center">
                                    Judul Laporan
                                </th>
                                <th class="col-md-1 text-center">
                                    Kelas
                                </th>
                                <th class="col-md-2 text-center">
                                    Tanggal Aktivitas
                                </th>
                                <th class="col-md-1 text-center">
                                    Duration
                                </th>
                                <th class="col-md-2 text-center">
                                    Notes
                                </th>
                                <th class="col-md-1 text-center">
                                    Oleh
                                </th>
                                <th class="col-md-2 text-center">
                                    Dilaporkan
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($activitys as $activity)
                                <tr>
                                    <td class="text-center">{{ $activity->id }}</td>
                                    <td class="text-center">{{ $activity->name }}</td>
                                    <td class="text-center">{{ $activity->classes->subject->name.'-'.$activity->classes->class }}</td>
                                    <td class="text-center">{{ $activity->date }}</td>
                                    <td class="text-center">{{ $activity->duration }}</td>
                                    <td class="col-md-1 text-center">{{ $activity->notes }}</td>
                                    <td class="col-md-1 text-center">{{ $activity->assistant->user->name }}</td>
                                    <td class="col-md-2 text-center">{{ $activity->created_at }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('activity.edit', $activity->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_activity_{{ $activity->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                        <!-- Modal -->
                                        <div class="modal fade modal-danger" id="delete_activity_{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Hapus Laporan Aktivitas</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin menghapus ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('activity.destroy', $activity->id) }}", method="post"
                                                        >
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
