@extends('menu')

@section('title')
    {{ __('wu.teacher.add_form.title_add') }}
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('teachersubject.store') }}">
            @csrf

            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa Przedmiotu:</label>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="subjects_id" id="subjects_id">
                        @foreach($subject as $subjects)
                            <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="surname" class="col-md-4 col-form-label text-md-right">Wykładowca:</label>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="teacher_id" id="teacher_id">
                        @foreach($teacher as $teachers)
                            <option value="{{$teachers->id}}">{{$teachers->name}} {{$teachers->surname}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Przypisz
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
