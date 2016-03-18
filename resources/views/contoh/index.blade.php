@extends('layouts.boxed')

@section('title')
    Desainer
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1> Desainer </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ URL::to('designer/create') }}" class="btn btn-primary" title="Tambah">
                    <span class="glyphicon glyphicon-plus">
                    </span>&nbsp;&nbsp;Tambah</a>
            </div>
        </div>
        <div class="row">
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Designer</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">
                                    #
                                </th>
                                <th class="text-center">
                                    Nama Designer
                                </th>
                                <th class='col-md-2 text-center'>
                                    Tanggal Mendaftar
                                </th>
                                <th class="col-md-2 text-center">
                                    Handled project
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>

                                    <td><a href="{{ URL::to('designer/detail/' . $item->id) }}"
                                           title="">{{ $item->firstname . ' ' .$item->lastname }}
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        {{--{{  count($pivots) }} todo --}}
                                    </td>

                                    <td class="text-center">
                                        {{--{{ $item->enabled ? ' Ya ' : 'Tidak' }} TODO --}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ URL::to('designer/update/' . $item->id) }}" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal{{$i}}"><span class="glyphicon glyphicon-remove"></span></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <a href="{{ URL::to('designer/delete/' . $item->id) }}">
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