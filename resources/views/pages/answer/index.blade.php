@extends('layouts.boxed')

@section('title')
    Kuisioner Apakah Kamu Baik?
@stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Kuisioner <strong>Apakah kamu baik? </strong></h1>
    </section>
    <section class="content">
        <br>
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Jawaban Kuisioner <strong>Apakah kamu baik? </strong></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-striped table-hover table-bordered" id="table-event">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">
                                    #
                                </th>
                                <th class="text-center">
                                    Nama Pengisi
                                </th>
                                <th class="col-md-8 text-center">
                                    Jawaban
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>

                                <td>
                                    John Robert
                                </td>

                                <td class="text-center">
                                    <ol>
                                        <li>
                                            <p>
                                                Q : Apakah kamu baik?
                                                <br>
                                                A : Ya, saya Baik.
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Q : Apakah kamu benar-benar yakin?
                                                <br>
                                                A : Ya, saya Baik.
                                            </p>
                                        </li>
                                    </ol>
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
