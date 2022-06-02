<?php

return [
    'group' => [
        'add_form' => [
            'title' => "Grupy",
            'title_add' => "Dodawanie grupy",
            'title_edit' => "Edycja grupy :name",
        ]
    ],
    'teacher' => [
        'add_form' => [
            'title' => "Wykładowcy",
            'title_add' => "Dodawanie wykładowcy",
            'title_edit' => "Edycja grupy :name",
        ]
    ],
    'status' => [
        'groups' => [
            'create' => 'Grupa została dodana',
            'update' => 'Grupa została zaktualizowana',
            'delete' => 'Grupa została usunięta',
        ],
        'teacher' => [
            'create' => 'Wykładowca została dodany',
            'update' => 'Wykładowca została zaktualizowany',
            'delete' => 'Wykładowca została usunięty',
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
