@extends('menu')

@section('title')
    <div class="row">
        <div class="col-10">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.student.add_form.title') }}</h3>
        </div>
        <div class="col-2">
            <a class="float-end" href=" {{ route('student.create') }}">
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
                <th scope="col">PESEL</th>
                <th scope="col">Email</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student as $students)
                @foreach($user as $users)
                    @if($users->id == $students->users_id)
                        <tr>
                            <th scope="row">{{ $students->id }}</th>
                            <td>{{ $students->name }}</td>
                            <td>{{ $students->surname }}</td>
                            <td>{{ $students->PESEL }}</td>
                            <td>{{ $users->email }}</td>
                            <td>
                                <a href="{{ route('student.show', $students->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
                                <a href="{{ route('student.edit', $students->id) }}">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $students->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{ $student->links() }}
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/student') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
