<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interview') }} # {{$interview->id}}
        </h2>
    </x-slot>
    @section('content')
        @dump($interview)
    @endsection
</x-app-layout>