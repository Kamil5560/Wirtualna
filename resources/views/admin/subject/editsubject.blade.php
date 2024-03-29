@extends('menu')

@section('title')
    {{ __('wu.subject.add_form.title_edit', ['name' => $subject->name]) }}
@endsection

@section('text')
    @include('helpers.flash-messages')
    <form method="POST" action="{{ route('subject.update', $subject->id) }}">
        {{ method_field('PUT') }}
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa przedmiotu:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                       value="{{ $subject->name }}" required autocomplete="name" autofocus>

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
@endsection
