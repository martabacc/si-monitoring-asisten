@extends('layouts.boxed')

@section('title')
    Desain
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1> Desain </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="" class="btn btn-primary" title="Tambah">
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
                        <h3 class="box-title">List Desain</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">
                                    #
                                </th>
                                <th class="col-md-3 text-center">
                                    Nama Desain
                                </th>
                                <th class='col-md-1 text-center'>
                                    Tipe Desain
                                </th>
                                <th class="col-md-2 text-center">
                                    Desainer
                                </th>
                                <th class="col-md-1 text-center">
                                    Verified
                                </th>
                                <th class="col-md-1 text-center">
                                    Menu
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>

                                <td><a href=""
                                       title="">Lala
                                    </a>
                                </td>

                                <td class="text-center">
                                    Lala 2
                                </td>

                                <td class="text-center">
                                    <a href="">
                                        Lala 3
                                    </a>
                                </td>

                                <td class="text-center">
                                    <span class="label label-warning">Pending</span>
                                    <span class="label label-danger">Denied</span>
                                    <span class="label label-success">Approved</span>
                                </td>

                                <td class="text-center">
                                    <a href="" class="btn btn-primary btn-xs"title="Sunting"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=""><span class="glyphicon glyphicon-remove"></span></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
