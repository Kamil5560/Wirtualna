@extends('admin')

@section('Tytulowa')
    <div class="row">
        <div class="col-2">
            <h3>Grupy</h3>
        </div>
        <div class="col-10">
            <a class="float-end" href=" {{ route('AdminGroupCreate') }}">
                <button type="button" class="btn btn-primary">Dodaj</button>
            </a>
        </div>
    </div>
@endsection

@section('tekst')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa grupy</th>
                    <th scope="col">Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a href="{{ route('AdminGroupShow', $group->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    P
                                </button>
                            </a>
                            <a href="{{ route('AdminGroupEdit', $group->id) }}">
                                <button class="btn btn-success btn-sm">
                                    E
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm delete" data-id="{{ $group->id }}">
                                X
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $groups->links() }}
        </div>
    </div>
@endsection

@section('javascript')
    const deleteUrl = "{{ url('admin/group') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
