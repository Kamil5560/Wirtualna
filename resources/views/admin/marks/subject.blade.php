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
                    <th class="col-8">Przedmioty dla grupy {{ $groups->name }}</th>
                    <th class="col-4">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sc as $scs)
                    @if($scs->groups_id == $groups->id)
                        @foreach($subject as $subjects)
                            @if($scs->subject_id == $subjects->id)
                                <tr>
                                    <td>{{ $subjects->name }}</td>
                                    <td>
                                        <a href="{{ route('marks.showmarks', ['groups' => $groups->id, 'subjects' => $subjects->id] ) }}">
                                            <button class="btn btn-primary btn-sm">
                                                Podglad studentów
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </a>
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
