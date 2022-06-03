@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.subject.add_form.title') }}</h3>
        </div>
        <div class="col-8">
            <a class="float-end" href=" {{ route('subject.create') }}">
                <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
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
                    <th scope="col">Nazwa przedmiotu</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subject as $subjects)
                        <tr>
                            <th scope="row">{{ $subjects->id }}</th>
                            <td>{{ $subjects->name }}</td>
                            <td>
                                <a href="{{ route('subject.show', $subjects->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
                                <a href="{{ route('subject.edit', $subjects->id) }}">
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $subjects->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
            {{ $subject->links() }}
        </div>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/subject') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
