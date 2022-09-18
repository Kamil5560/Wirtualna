@extends('menu')

@section('title')
    <div class="row">
        <div class="col-12">
            <h3><i class="fa-solid fa-trash"></i> {{ __('wu.subjectclass.add_form.title_edit') }}</h3>
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
                    <th scope="col">Nazwa Grupy</th>
                    <th scope="col">Przypisane przedmioty</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subject_class as $sc)
                    <tr>
                        <td>{{ $sc->id }}</td>
                        <td>
                        @foreach($groups as $group)
                            @if($sc->groups_id == $group->id)
                        {{ $group->name }}
                                @endif
                        @endforeach
                        </td>
                        <td>
                        @foreach($subjects as $subject)
                            @if($sc->subject_id == $subject->id)
                        {{ $subject->name }}
                            @endif
                        @endforeach
                        <td>
                            <button class="btn btn-danger btn-sm delete" data-id="{{ $sc->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/subjectclass/show') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
