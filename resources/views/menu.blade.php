@extends('layouts.app')

@section('menu')
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> //TODO: to nie działa. Jak się zmieniejsza strony to ni chuja nie działa
                -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @can('isAdmin')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Strona główna</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('group.index') }}">Grupy</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('teacher.index') }}">Wykładowcy</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('student.index') }}">Studenci</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('subject.index') }}">Przedmioty</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Oceny</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Inne
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Dodaj przedmiot do grupy</a></li>
                                    <li><a class="dropdown-item" href="#">Przypisz nauczyciela do przedmiotu</a></li>
                                    <li><a class="dropdown-item" href="#">Wyświetl przedmioty dla grupy</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route("user.index") }}">Administratorzy</a></li>
                                </ul>
                            </li>
{{--                            <li class="nav-item active">--}}
{{--                                <a class="nav-link" href="#">Zmień hasło użytkownika</a>--}}
{{--                            </li>--}}
                        @endcan
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @yield('text')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
