@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.student.add_form.title') }}</h3>
        </div>
    </div>
@endsection

@section('text')

    @include('helpers.flash-messages')
    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th spone="col">Grupa</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                @foreach($users as $user)
                    @if($user->id == $student->users_id)
                        @foreach($groups as $group)
                            @if($student->groups_id == $group->id)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
@endsection
