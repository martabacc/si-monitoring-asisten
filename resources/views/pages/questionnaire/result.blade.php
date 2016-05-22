@extends('layouts.boxed')

@section('title')
    Kuisioner
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1>Statistik Kuisioner - {{ $questionnaire->title }}</h1>
        @if(session('questionnaireAnswered'))
            <br>
            <div class="alert alert-success">Questionnaire answered!</div>
        @endif
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Hasil Kuisoner</h3>
                    </div>
                    <div class="box-body">
                        <ol>
                            @foreach($questions as $question)
                                <li>
                                    {{ $question->question }}
                                    <ul>
                                        @foreach($question->option as $option)
                                            <li>
                                                <label>{{ $option->answer.' - '.$results[$question->id][$option->id].'%' }}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ol>
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
