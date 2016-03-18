@extends('layouts.boxed')

@section('title')
    Tambah Desainer
    @stop

@section('content')
    @include('partials.flash-overlay-modal')

    <section class="content-header">
        <h1>Designer</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Designer</h3>
                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <form action="" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="role" value="2">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Nama Designer</label>
                                <div class="col-sm-4">
                                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-8">
                                    <label>
                                        <input type="radio" name="gender" class="minimal-red" value="0">
                                        Laki-laki
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" name="gender" class="minimal-red" value="1">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">No KTP</label>
                                <div class="col-sm-8">
                                    <input type="number" name="identitynumber" class="form-control" required
                                           data-inputmask="'mask': ['9999-9999-9999-9999 [x99999]]" data-mask>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Alamat </label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">No HP</label>
                                <div class="col-sm-8">
                                    <input type="number" name="contact" class="form-control"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Verifikasi</label>
                                <div class="col-sm-8">
                                    <input type="checkbox" name="verified" class="minimal-red">
                                    <label> Centang jika sudah terverifikasi </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Ketersediaan</label>
                                <div class="col-sm-8">
                                    <input type="checkbox" name="available"  class="minimal-red">
                                    <label> Centang jika sudah terverifikasi </label>
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
    <script type="text/javascript">
        $(function(){


            $("[data-mask]").inputmask();

        });
    </script>
@stop
