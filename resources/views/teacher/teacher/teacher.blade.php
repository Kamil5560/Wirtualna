@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.teacher.add_form.title') }}</h3>
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
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                @foreach($users as $user)
                    @if($user->id == $teacher->users_id)
                        <tr>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->surname }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{ $teachers->links() }}
    </div>
@endsection
