@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>
                <i class="fa-solid fa-users-rectangle"></i> {{ __('wu.group.add_form.title_show', ['name' => $group->name]) }}
            </h3>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa grupy:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $group->name }}" disabled>
            </div>
        </div>

        <hr class="my-4">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th colspan="2" style="text-align: center">Studenci w grupie</th>
                </tr>
                <tr>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student as $students)
                    @if($students->groups_id == $group->id)
                        <tr>
                            <td>{{ $students->name }}</td>
                            <td>{{ $students->surname }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <hr class="my-4">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th colspan="2" style="text-align: center">Przedmioty w grupie</th>
                </tr>
                <tr>
                    <th scope="col">Przedmioty</th>
                </tr>
                </thead>
                <tbody>
                        @foreach($subject_class as $sc)
                            @if($group->id == $sc->groups_id)
                                @foreach($subjects as $subject)
                                    @if($sc->subject_id == $subject->id)
                                        <tr>
                                            <td>
                                                {{$subject->name}}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
