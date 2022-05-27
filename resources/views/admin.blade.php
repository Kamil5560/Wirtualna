@extends('layouts.app')

@section('menu')
    <div class="container">
        <div class="row justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button> //TODO: to nie działa. Jak się zmieniejsza strony to ni chuja nie działa
                -->            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Strona główna</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('AdminGroup') }}">Grupy</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('AdminTeacher') }}">Wykładowcy</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Oceny</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Studenci</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Przedmioty</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Dodaj przedmiot do grupy</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Wyświetl przedmioty dla grupy</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Zmień hasło użytkownika</a>
                        </li>
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
                    <div class="card-header">@yield('Tytulowa')</div>
                    <div class="card-body">
                        @yield('tekst')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
