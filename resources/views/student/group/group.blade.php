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
                    <th scope="col" class="col-8">Nazwa grupy</th>
                    <th scope="col" class="col-4">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->name!='brak')
                        <tr>
                            <td>{{ $group->name }}</td>
                            <td>
                                <a href="{{ route('studentgroup.show', $group->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        Podgląd grupy
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{ $groups->links() }}
        </div>
    </div>
@endsection
