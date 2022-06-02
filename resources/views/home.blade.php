@extends('menu')

@section('title')
    Strona główna
@endsection

@section('text')


                    @include('helpers.flash-messages')
                    {{ __('You are logged in!') }}

@endsection
