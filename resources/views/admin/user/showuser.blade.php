@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>
                <i class="fa-solid fa-users-rectangle"></i> {{ __('wu.user.add_form.title_show', ['name' => $user->name]) }}
            </h3>
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
                           value="{{ $user->name }}" disabled autocomplete="name" autofocus>
                </div>

                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="email"
                           value="{{ $user->email}}" disabled autocomplete="email" autofocus>
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">Rola:</label>

                @if($user->role == "teacher")
                <div class="col-md-6">
                    <input id="role" type="text" class="form-control" name="role"
                           value="Wykładowca" disabled autocomplete="role" autofocus>
                </div>
                @elseif($user->role == "student")
                    <div class="col-md-6">
                        <input id="role" type="text" class="form-control" name="role"
                               value="Student" disabled autocomplete="role" autofocus>
                    </div>
                @else
                    <div class="col-md-6">
                        <input id="role" type="text" class="form-control" name="role"
                               value="Administrator" disabled autocomplete="role" autofocus>
                    </div>
                @endif

            </div>
            <input id="id" type="text" class="form-control" name="id"
                   value="{{$user->id}}" hidden>
    </div>
@endsection
