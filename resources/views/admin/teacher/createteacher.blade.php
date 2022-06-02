@extends('menu')

@section('title')
    {{ __('wu.teacher.add_form.title_add') }}
@endsection

@section('text')
    <div class="card-body">
        <form method="POST" action="{{ route('teacher.store') }}">
            @csrf

            <div class="row mb-3">

                <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

                <div class="col-md-6">
                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                           value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                <div class="col-md-6">

                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="password" class="col-md-4 col-form-label text-md-right">Hasło:</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           value="{{ old('password') }}" required autocomplete="password" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">Powtórz hasło:</label>

                <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="col-md-6">
                    <input id="role" type="text" class="form-control" name="role"
                           value="teacher" hidden>
                </div>

            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Utwórz
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
