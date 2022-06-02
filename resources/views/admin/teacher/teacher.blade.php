@extends('menu')

@section('title')
    <div class="row">
        <div class="col-10">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.teacher.add_form.title') }}</h3>
        </div>
        <div class="col-2">
            <a class="float-end" href=" {{ route('teacher.create') }}">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')

    @include('helpers.flash-messages')
<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Email</th>
            <th scope="col">Przedmiot</th>
            <th scope="col">Akcja</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            @foreach($users as $user)
                @if($user->id == $teacher->users_id)
            <tr>
                <th scope="row">{{ $teacher->id }}</th>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>-</td>
                <td>
                    <a href="{{ route('teacher.show', $teacher->id) }}">
                        <button class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </a>
                    <a href="{{ route('teacher.edit', $teacher->id) }}">
                        <button class="btn btn-success btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </a>
                    <button class="btn btn-danger btn-sm delete" data-id="{{ $teacher->id }}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endif
            @endforeach
        @endforeach
        </tbody>
    </table>
    {{ $teachers->links() }}
</div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/teacher') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
