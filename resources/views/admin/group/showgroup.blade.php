@extends('menu')

@section('title')
    Podgląd grupy
@endsection

@section('text')
    <div class="card-body">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nazwa grupy:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $group->name }}" disabled>
                </div>
            </div>
    </div>
@endsection
