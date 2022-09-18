@extends('menu')

@section('title')
    <div class="row">
        <div class="col-4">
            <h3><i class="fa-solid fa-users-rectangle"></i> {{ __('wu.marks.add_form.title') }}</h3>
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
                    <th class="col-7">Imię i nazwisko</th>
                    <th class="col-3">Ocena</th>
                    <th class="col-4">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student as $students)
                    <tr>
                        @if($students->groups_id == $group_id)
                            <td>{{ $students->name }} {{ $students->surname }}</td>
                            <?php $flaga = false ?>
                            @foreach($sm as $sms)
                                @if($sms->subject_id == $subject_id && $sms->student_id == $students->id)
                                    <td>{{ $sms->marks }}</td>
                                    <?php $sm_id = $sms->id;
                                    $flaga = true;
                                    ?>
                                        <td>
                                            <a href="{{ route('marks.edit', ['groups' => $group_id, 'subjects' => $subject_id, 'sm_id' => $sm_id, 'student'=>$students->id] ) }}">
                                                <button class="btn btn-primary btn-sm">
                                                    Edytuj
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </button>
                                            </a>
                                        </td>
                                @endif
                            @endforeach
                            @if($flaga == false)
                                <td>brak</td>
                                <?php $sm_id = 0 ?>
                                <td>
                                    <a href="{{ route('marks.edit', ['groups' => $group_id, 'subjects' => $subject_id, 'sm_id' => $sm_id, 'student'=>$students->id] ) }}">
                                        <button class="btn btn-primary btn-sm">
                                            Edytuj
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </a>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
