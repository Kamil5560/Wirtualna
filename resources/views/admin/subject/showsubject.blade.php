@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>
                <i class="fa-solid fa-users-rectangle"></i> {{ __('wu.subject.add_form.title_show', ['name' => $subject->name]) }}
            </h3>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa Przedmiotu:</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name"
                       value="{{ $subject->name }}" disabled>
            </div>
        </div>
    </div>
@endsection
