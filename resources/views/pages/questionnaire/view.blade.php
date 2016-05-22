@extends('layouts.boxed')

@section('title')
    Kuisioner
@stop

@section('content')

    @include('partials.flash-overlay-modal')
    <section class="content-header">
        <h1>Jawab Kuisioner - {{ $questionnaire->title }}</h1>
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
                        <h3 class="box-title">Kuisoner</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('questionnaire.answer', $questionnaire->id) }}" method="post">
                            {{ csrf_field() }}
                            <ol>
                                @foreach($questions as $question)
                                    <li>
                                        {{ $question->question }}
                                        <div class="form-group">
                                            @foreach($question->option as $option)
                                                <div class="radio">
                                                    <label><input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}" required>{{ $option->answer }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
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
