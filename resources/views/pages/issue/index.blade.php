@extends('layouts.boxed')

@section('title')
    Laporan Kendala
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Laporan Kendala</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('issue.create') }}" class="btn btn-primary" title="Tambah">
                    <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah
                </a>
            </div>
        </div>
        <br>
        @if (session('issueDeleted'))
            <div class="alert alert-danger">Issue deleted!</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Lihat Laporan Kendala</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">
                                    #
                                </th>
                                <th class="col-md-2 text-center">
                                    Kegiatan
                                </th>
                                <th class="col-md-3 text-center">
                                    Problem
                                </th>
                                <th class="col-md-2 text-center">
                                    Urgensitas
                                </th>
                                <th class="col-md-2 text-center">
                                    Dilaporkan Tanggal
                                </th>
                                <th class="col-md-2 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($issues as $issue)
                            <tr>
                                <td class="text-center">{{ $issue->id }}</td>
                                <td>
                                    <a href="{{ route('activity.edit', $issue->activity_id) }}" class="text-center">
                                        {{ $issue->activity->name.' '.$issue->activity->classes->name.'-'.$issue->activity->classes->class }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $issue->problem }}</td>
                                <td class="text-center">
                                    @if($issue->urgency == 0)
                                        <span class="label label-warning">Normal</span>
                                    @elseif($issue->urgency == 1)
                                        <span class="label label-danger">Penting</span>
                                    @else
                                        <span class="label label-success">Solved</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $issue->solution }}</td>
                                <td class="text-center">
                                    <a href="{{ route('issue.edit', $issue->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_issue_{{ $issue->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger" id="delete_issue_{{ $issue->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Hapus Designer</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <a href="">
                                                        <button type="button" class="btn btn-primary">Ok!!</button>
                                                    </a>
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
