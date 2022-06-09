@extends('menu')

@section('title')
    <div class="row">
        <div class="col-6">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.subjectclass.add_form.title') }}</h3>
        </div>
        <div class="col-3">
            <a class="float-end" href="{{route('teachersubject.create')}}">
                <button type="button" class="btn btn-primary">Przypisz<i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
        <div class="col-3">
            <a class="float-end" href="{{route('teachersubject.show')}}">
                <button type="button" class="btn btn-danger delete">Usuń<i class="fa-solid fa-trash"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    @include('helpers.flash-messages')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nazwa Przedmiotu</th>
                    <th scope="col">Przypisany wykładowca</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subject as $subjects)
                    <tr>
                        <td>{{ $subjects->name }}</td>
                        <td>
                            @foreach($teacher_subject as $ts)
                                @if($subjects->id == $ts->subject_id)
                                    @foreach($teacher as $teachers)
                                        @if($ts->teacher_id == $teachers->id)
                                            {{$teachers->name}} {{ $teachers->surname }},<br>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
