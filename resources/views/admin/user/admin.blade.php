@extends('menu')

@section('title')
    <div class="row">
        <div class="col-10">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.user.add_form.title') }}</h3>
        </div>
        <div class="col-2">
            <a class="float-end" href=" {{ route('user.create') }}">
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
                <th scope="col">Email</th>
                <th scope="col">Akcja</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $users)
                    @if($users->role == "admin")
                        <tr>
                            <th scope="row">{{ $users->id }}</th>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>
                                <a href="{{ route('user.show', $users->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
                                <a href="{{ route('user.edit', $users->id) }}">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $users->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/user') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
