@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.teacher.add_form.title_show', ['name' => $teacher->name]) }}</h3>
        </div>
        <div class="col-4">
            <a class="float-end" href=" {{ route('useredit.show', $teacher->users_id) }}">
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
                           value="{{ $teacher->name }}" disabled autocomplete="name" autofocus>
                </div>

                <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control" name="surname"
                           value="{{ $teacher->surname }}" disabled autocomplete="surname" autofocus>
                </div>

                <div class="col-md-6">
                    <input id="users_id" type="text" class="form-control" name="users_id"
                           value="{{$teacher->users_id}}" hidden>
                </div>

            </div>
    </div>
@endsection
