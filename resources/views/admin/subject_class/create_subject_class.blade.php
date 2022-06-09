@extends('menu')

@section('title')
    {{ __('wu.teacher.add_form.title_add') }}
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('subjectclass.store') }}">
            @csrf

            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa grupy:</label>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="groups_id" id="groups_id">
                        @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwa przedmiotu:</label>

                <div class="col-md-6">
                    <select class="form-select" aria-label="Default select example" name="subject_id" id="subject_id">
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
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
