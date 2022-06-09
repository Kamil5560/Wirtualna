@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.group.add_form.title') }}</h3>
        </div>
        <div class="col-5">
            <a class="float-end" href=" {{ route('student.index') }}">
                <button type="button" class="btn btn-success">Zmień grupę studentowi <i class="fa-solid fa-pen-to-square"></i></button>
            </a>
        </div>
        <div class="col-3">
            <a class="float-end" href=" {{ route('group.create') }}">
                <button type="button" class="btn btn-primary">Dodaj grupę <i class="fa-solid fa-plus"></i></button>
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
                    <th scope="col">#</th>
                    <th scope="col">Nazwa grupy</th>
                    <th scope="col">Studenci</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->name!='brak')
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td>{{ $group->name }}</td>
                        <td>
                            @foreach($student as $students)
                                @if($students->groups_id == $group->id)
                                    {{ $students->name }} {{ $students->surname }},
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('group.show', $group->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </a>
                            <a href="{{ route('group.edit', $group->id) }}">
                                <button class="btn btn-success btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm delete" data-id="{{ $group->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $groups->links() }}
        </div>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/group') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
