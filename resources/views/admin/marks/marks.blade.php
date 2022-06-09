@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.group.add_form.title') }}</h3>
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
                    <th scope="col">Nazwa grupy</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->name!='brak')
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>
                                <a href="{{ route('group.show', $group->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
{{--                                <a href="{{ route('group.edit', $group->id) }}">--}}
{{--                                    <button class="btn btn-success btn-sm">--}}
{{--                                        <i class="fa-solid fa-pen-to-square"></i>--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                <button class="btn btn-danger btn-sm delete" data-id="{{ $group->id }}">--}}
{{--                                    <i class="fa-solid fa-trash"></i>--}}
{{--                                </button>--}}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/group') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
