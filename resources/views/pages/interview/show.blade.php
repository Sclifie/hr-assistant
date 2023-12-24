@extends('dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interview') }}
        </h2>
    </x-slot>
@section('content')
    @dump('hello show')
@endsection