@extends('menu')

@section('title')
    Strona główna
@endsection

@section('text')

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

@endsection
