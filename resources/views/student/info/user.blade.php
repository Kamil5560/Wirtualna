@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>Informacje o studencie</h3>
        </div>
        <div class="col-4">
            <a class="float-end" href="{{ route('studentinfo.edit', $user->id) }}">
                <button type="button" class="btn btn-primary">Zmiana hasła <i class="fa-solid fa-pen-to-square"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    @include('helpers.flash-messages')
    <div class="card-body">
        @csrf
        <div class="row mb-3">

            <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $studentname }}" disabled autocomplete="name" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control" name="surname"
                       value="{{ $studentsurname }}" disabled autocomplete="surname" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">PESEL:</label>
            <div class="col-md-6">
                <input id="studentpesel" type="text" class="form-control" name="studentpesel"
                       value="{{ $studentpesel }}" disabled autocomplete="studentpesel" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Email:</label>
            <div class="col-md-6">
                <input id="useremail" type="text" class="form-control" name="useremail"
                       value="{{ $user->email }}" disabled autocomplete="useremail" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Grupa:</label>
            <div class="col-md-6">
                <input id="groupname" type="text" class="form-control" name="groupname"
                       value="{{ $groupname }}" disabled autocomplete="groupname" autofocus>
            </div>

            <div class="col-md-6">
{{--                <input id="users_id" type="text" class="form-control" name="users_id"--}}
{{--                       value="{{$teacher->users_id}}" hidden>--}}
            </div>

        </div>
    </div>
@endsection
