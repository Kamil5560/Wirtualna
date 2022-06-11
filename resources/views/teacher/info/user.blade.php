@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>Informacje o wykładowcy</h3>
        </div>
        <div class="col-4">
            <a class="float-end" href="{{ route('teacherinfo.edit', $user->id) }}">
                <button type="button" class="btn btn-primary">Zmiana hasła <i class="fa-solid fa-pen-to-square"></i></button>
            </a>
        </div>
    </div>
@endsection

@section('text')
    @include('helpers.flash-messages')
    <div class="card-body">
        @csrf
        <div class="row mb-3">

            <label for="name" class="col-md-4 col-form-label text-md-right">Imię:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $teachername }}" disabled autocomplete="name" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Nazwisko:</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control" name="surname"
                       value="{{ $teachersurname }}" disabled autocomplete="surname" autofocus>
            </div>

            <label for="surname" class="col-md-4 col-form-label text-md-right">Email:</label>
            <div class="col-md-6">
                <input id="useremail" type="text" class="form-control" name="useremail"
                       value="{{ $user->email }}" disabled autocomplete="useremail" autofocus>
            </div>

            <hr class="my-4">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th colspan="2" style="text-align: center">Przyległe przedmioty</th>
                </tr>
                <tr>
                    <th scope="col">Przedmiot</th>
                    <th scope="col">Grupa</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ts as $fets)
                        @if($fets->teacher_id == $teacherid)
                            <tr>
                                <td>
                                    @foreach($subject as $fesubject)
                                        @if($fesubject->id == $fets->subject_id)
                                            {{ $fesubject->name }}
                                            <?php $subject_id = $fesubject->id ?>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($sc as $fesc)
                                        @if($fesc->subject_id == $subject_id)
                                            @foreach($group as $fegroup)
                                                @if($fegroup->id == $fesc->groups_id)
                                                    {{ $fegroup->name }}
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
