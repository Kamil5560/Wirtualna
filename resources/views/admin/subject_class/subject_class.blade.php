@extends('menu')

@section('title')
    <div class="row">
        <div class="col-6">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.subjectclass.add_form.title') }}</h3>
        </div>
        <div class="col-3">
            <a class="float-end" href="{{route('subjectclass.create')}}">
                <button type="button" class="btn btn-primary">Przypisz<i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
        <div class="col-3">
            <a class="float-end" href="{{route('subjectclass.show')}}">
                <button type="button" class="btn btn-danger delete">Usuń<i class="fa-solid fa-trash"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    @include('helpers.flash-messages')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nazwa Grupy</th>
                    <th scope="col">Przypisane przedmioty</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            @foreach($subject_class as $sc)
                                @if($group->id == $sc->groups_id)
                                    @foreach($subjects as $subject)
                                        @if($sc->subject_id == $subject->id)
                                        {{$subject->name}},<br>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
