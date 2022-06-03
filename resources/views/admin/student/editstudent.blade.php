@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.student.add_form.title_edit', ['name' => $student->name]) }}</h3>
        </div>
        <div class="col-4">
            <a class="float-end" href=" {{ route('user.edit', $student->users_id) }}">
                <button type="button" class="btn btn-primary">Edycja konta <i class="fa-solid fa-pen-to-square"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('student.update', $student->id) }}">
            {{ method_field('PUT') }}
            @csrf

            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ $student->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                           value="{{ $student->surname }}" required autocomplete="surname" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="PESEL" class="col-md-4 col-form-label text-md-right">PESEL:</label>

                <div class="col-md-6">
                    <input id="PESEL" type="text" class="form-control @error('PESEL') is-invalid @enderror" name="PESEL"
                           value="{{ $student->PESEL }}" required autocomplete="PESEL" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <input id="users_id" type="text" class="form-control" name="users_id"
                           value="{{$student->users_id}}" hidden>
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
