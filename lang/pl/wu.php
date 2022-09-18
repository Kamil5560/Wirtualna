<?php

return [
    'group' => [
        'add_form' => [
            'title' => "Grupy",
            'title_add' => "Dodawanie grupy",
            'title_edit' => "Edycja grupy :name",
            'title_show' => "Podgląd grupy :name",
        ],
        'status' => [
            'create' => 'Grupa została dodana',
            'update' => 'Grupa została zaktualizowana',
            'delete' => 'Grupa została usunięta',
        ],
    ],
    'teacher' => [
        'add_form' => [
            'title' => "Wykładowcy",
            'title_add' => "Dodawanie wykładowcy",
            'title_edit' => "Edycja wykładowcy :name",
            'title_show' => "Podgląd wykładowcy :name",
        ],
        'status' => [
            'create' => 'Wykładowca została dodany',
            'update' => 'Wykładowca została zaktualizowany',
            'delete' => 'Wykładowca została usunięty',
        ],
    ],
    'user' => [
        'add_form' => [
            'title' => "Administratorzy",
            'title_add' => "Dodawanie administratora",
            'title_edit' => "Edycja użytkownika :name",
            'title_show' => "Podgląd użytkownika :name",
        ],
        'status' => [
            'create' => 'Użytkownik została dodany',
            'update' => 'Użytkownik został zaktualizowany',
            'delete' => 'Użytkownik został usunięty',
        ],
    ],
    'student' => [
        'add_form' => [
            'title' => "Studenci",
            'title_add' => "Dodawanie studenta",
            'title_edit' => "Edycja studenta :name",
            'title_show' => "Podgląd studenta :name",
        ],
        'status' => [
            'create' => 'Student został dodany',
            'update' => 'Student został zaktualizowany',
            'delete' => 'Student został usunięty',
        ],
    ],
    'subject' => [
        'add_form' => [
            'title' => "Przedmioty",
            'title_add' => "Dodawanie przedmiotu",
            'title_edit' => "Edycja przedmiotu :name",
            'title_show' => "Podgląd przedmiotu :name",
        ],
        'status' => [
            'create' => 'Przedmiot został dodany',
            'update' => 'Przedmiot został zaktualizowany',
            'delete' => 'Przedmiot został usunięty',
        ],
    ],
    'subjectclass' => [
        'add_form' => [
            'title' => "Przypisanie przedmiotu",
            'title_add' => "Utwórz przypisanie przedmiotu do grupy",
            'title_edit' => "Wybierz co usunąć",
        ],
        'status' => [
            'create' => "Stworzono powiązanie",
        ]
    ],
    'teachersubject' => [
        'add_form' => [
            'title' => "Przypisanie wykładowcy",
            'title_add' => "Utwórz przypisanie",
            'title_edit' => "Wybierz co usunąć",
        ],
        'status' => [
            'create' => "Stworzono powiązanie",
        ]
    ],
    'marks' => [
        'add_form' => [
            'title' => "Wybierz Ocenę",
            'title_add' => "Dodawanie oceny",
            'title_edit' => "Edytuj ocenę",
            'title_show' => "Podgląd oceny",
        ],
        'status' => [
            'null' => "Nie wybrano oceny",
            'add' => "Ocena została dodana",
            'delete' => "Ocena została usunięta",
            'update' => "Ocena została zmieniona",
        ]
    ],
    'role' => [
        'teacher' => 'Wykładowca',
        'Admin' => 'Admin',
        'Student' => 'Student',
    ]
];
//TODO: alternatywa jeżeli chodzi o tłumaczenia. Potem żeby to zasotować to w blade dajemy {{ __('wu.group.add_form.title') }} (plik.klucz.klucz etc) i wyświeli się "Grupy"
//TODO: "Edycja grupy :name" tutaj wyświetla się pod name konkretna grupa którą wybieramy. realizujemy to poprzez zapis {{ __('wu.group.add_form.title_edit', ['name' => $group->name]) }}
