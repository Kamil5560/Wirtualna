@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>
                <i class="fa-solid fa-users-rectangle"></i> {{ __('wu.user.add_form.title_edit', ['name' => $user->name]) }}
            </h3>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            {{ method_field('PUT') }}
            @csrf

            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ $user->email}}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                    @enderror
                </div>
                <div class="col-12">
                    <hr>
                    Jeżeli nie chcesz zmienić hasło zostaw poniższe pola puste!<br></div>
                <label for="password" class="col-md-4 col-form-label text-md-right">Hasło:</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password"
                           value="{{ old('password') }}" autocomplete="password" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                    @enderror
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">Powtórz hasło:</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           autocomplete="new-password">
                </div>

{{--                <label for="name" class="col-md-4 col-form-label text-md-right">Rola:</label>--}}

{{--                <div class="col-md-6">--}}
{{--                    <select class="form-select" id="role" name="role" aria-label="Default select example">--}}
{{--                        <option selected value="{{ $user->role }}">Aktualnie: {{ $user->role }}</option>--}}
{{--                        <option disabled><hr class="dropdown-divider"></option>--}}
{{--                        <option value="admin">admin</option>--}}
{{--                        <option value="teacher">teacher</option>--}}
{{--                        <option value="student">student</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

            </div>
            <input id="role" type="text" class="form-control" name="role"
                   value="{{ $user->role }}" hidden>
            <input id="id" type="text" class="form-control" name="id"
                   value="{{$user->id}}" hidden>
            <input id="passwordhash" type="text" class="form-control" name="passwordhash"
                   value="{{$user->password}}" hidden>

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
