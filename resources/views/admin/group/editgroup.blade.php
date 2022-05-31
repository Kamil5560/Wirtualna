@extends('menu')

@section('Tytulowa')
    {{ __('wu.group.add_form.title_edit', ['name' => $group->name]) }}
@endsection

@section('tekst')
    <div class="card-body">
        <form method="POST" action="{{ route('group.update', $group->id) }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">Wprowadź nazwę grupy:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ $group->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Zmień
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
