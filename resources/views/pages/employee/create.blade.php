<x-app-layout>
    <x-slot name="header">
        {{__('employee.Employees')}}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @livewire('employee.create')
            </div>
        </div>
    </div>
</x-app-layout>