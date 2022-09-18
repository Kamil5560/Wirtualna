@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> Edytuj ocenę</h3>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('marks.update', ['groups' => $id_group, 'subjects' => $id_subject, 'student' => $id_student, 'sm_id' => $id_sm]) }}">
{{--            {{ method_field('PUT') }}--}}
            @csrf
            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Grupa:</label>

                <div class="col-md-6">
                    <input id="group" type="text" class="form-control" name="group"
                           value="{{ $groupsname }}" required autocomplete="group" autofocus disabled>
                    <input id="id_group" type="text" class="form-control" name="id_group"
                           value="{{$id_group}}" hidden>
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">Student:</label>

                <div class="col-md-6">
                    <input id="student" type="text" class="form-control" name="student"
                           value="{{ $studentname }} {{ $studentsurname }}" required autocomplete="student" autofocus
                           disabled>
                    <input id="id_student" type="text" class="form-control" name="id_student"
                           value="{{$id_student}}" hidden>
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">Przedmiot:</label>

                <div class="col-md-6">
                    <input id="subject" type="text" class="form-control" name="subject"
                           value="{{ $subjectname }}" required autocomplete="subject" autofocus disabled>
                    <input id="id_subject" type="text" class="form-control" name="id_subject"
                           value="{{$id_subject}}" hidden>
                </div>
                <hr class="my-4">
                <label for="name" class="col-md-4 col-form-label text-md-right">Ocena:</label>
                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" id="marks" name="marks">
                        <option selected value="{{ $marks }}">@if($marks == 0) brak @else {{ $marks }} @endif</option>
                        @if($marks != 0)
                        <option value="U" style="color: red">Usuń ocenę</option>
                        @endif
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Edytuj
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
