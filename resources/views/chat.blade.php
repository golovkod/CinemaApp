@extends('base')

@section('main')
    <div class="container">
        <chat-component :user="{{ auth()->user() }}"></chat-component>
    </div>
@endsection
