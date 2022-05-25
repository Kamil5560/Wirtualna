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
                            <a class="nav-link" href="#">Strona główna</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Grupy
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Dodaj</a></li>
                                <li><a class="dropdown-item" href="#">Usuń</a></li>
                                <li><a class="dropdown-item" href="#">Edytuj</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Wyświetl</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Wykładowcy
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/admin/teacher/add">Dodaj</a></li>
                                <li><a class="dropdown-item" href="#">Usuń</a></li>
                                <li><a class="dropdown-item" href="#">Edytuj</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/admin/teacher/show">Wyświetl</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Oceny
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Dodaj</a></li>
                                <li><a class="dropdown-item" href="#">Usuń</a></li>
                                <li><a class="dropdown-item" href="#">Edytuj</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Wyświetl</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Studenci
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Dodaj</a></li>
                                <li><a class="dropdown-item" href="#">Usuń</a></li>
                                <li><a class="dropdown-item" href="#">Edytuj</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Wyświetl</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Przedmioty
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Dodaj</a></li>
                                <li><a class="dropdown-item" href="#">Usuń</a></li>
                                <li><a class="dropdown-item" href="#">Edytuj</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Wyświetl</a></li>
                            </ul>
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
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @yield('tekst')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
