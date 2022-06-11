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
                    <th class="col-8">Przedmioty</th>
                    <th class="col-4">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ts as $fets)
                    @if($fets->teacher_id == $teacher_id)
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
                                <a href="{{ route('teachermarks.showgroup', ['subjects' => $subject_id] ) }}">
                                    <button class="btn btn-primary btn-sm">
                                        Podglad grup
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
