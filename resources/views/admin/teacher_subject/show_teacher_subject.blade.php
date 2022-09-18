@extends('menu')

@section('title')
    <div class="row">
        <div class="col-12">
            <h3><i class="fa-solid fa-trash"></i> {{ __('wu.teachersubject.add_form.title_edit') }}</h3>
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
                    <th scope="col">Przypisany wykładowca</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teacher_subject as $ts)
                    <tr>
                        <td>{{ $ts->id }}</td>
                        <td>
                            @foreach($subject as $subjects)
                                @if($ts->subject_id == $subjects->id)
                                    {{ $subjects->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                        @foreach($teacher as $teachers)
                            @if($ts->teacher_id == $teachers->id)
                                {{ $teachers->name }} {{ $teachers->surname }}
                            @endif
                        @endforeach
                        <td>
                            <button class="btn btn-danger btn-sm delete" data-id="{{ $ts->id }}">
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
    const deleteUrl = "{{ url('admin/teachersubject/show') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
