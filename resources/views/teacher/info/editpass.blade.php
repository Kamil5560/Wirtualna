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
        <form method="POST" action="{{ route('teacherinfo.update', $user->id) }}">
            @csrf

            <div class="row mb-3">


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
