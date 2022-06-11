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
                    <th class="col-8">Nazwa grupy</th>
                    <th class="col-4">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sc as $fesc)
                    @if($fesc->subject_id == $subject_id)
                        <tr>
                            <td>
                                @foreach($group as $groups)
                                    @if($groups->id == $fesc->groups_id)
                                        {{ $groups->name }}
                                        <?php $group_id = $groups->id ?>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('teachermarks.showstudent', ['groups' => $group_id, 'subjects' => $subject_id]) }}">
                                    <button class="btn btn-primary btn-sm">
                                        Podglad studentów
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
