@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.teacher.add_form.title_show', ['name' => $student->name]) }}</h3>
        </div>
        <div class="col-4">
            <a class="float-end" href=" {{ route('user.show', $student->users_id) }}">
                <button type="button" class="btn btn-primary">Podgląd konta <i class="fa-solid fa-magnifying-glass"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        @csrf

        <div class="row mb-3">

            <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $student->name }}" disabled autocomplete="name" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control" name="surname"
                       value="{{ $student->surname }}" disabled autocomplete="surname" autofocus>
            </div>

            <label for="PESEL" class="col-md-4 col-form-label text-md-right">PESEL:</label>

            <div class="col-md-6">
                <input id="PESEL" type="text" class="form-control" name="PESEL"
                       value="{{ $student->PESEL }}" disabled autocomplete="PESEL" autofocus>
            </div>

            <div class="col-md-6">
                <input id="users_id" type="text" class="form-control" name="users_id"
                       value="{{$student->users_id}}" hidden>
            </div>

        </div>
    </div>
@endsection
