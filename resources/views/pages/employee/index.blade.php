<x-app-layout>
    <x-slot name="header">
        {{__('employee.Employees')}}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                @if($employees !== null)
                    @foreach($employees as $employee)
                        <div class="mb-2 bg-gray-100 p-2 flex justify-between leading-none items-center">
                            <h3 class="text-lg">{{$employee->name}}</h3>
                            <a href="{{route('interview.edit',['interview' => $employee->id])}}"
                               class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white"
                            >{{__("employee.'Follow on employee'")}}</a>
                        </div>
                    @endforeach
                    <div class="p-2 my-8 bg-gray-100 flex justify-end">
                        <a class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white" href="{{route('employee.create')}}">{{__('Create')}}</a>
                    </div>
                    <div>
                        {{$employees->links()}}
                    </div>
                @else
                    <div>
                        Пока нет ни одного работника
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>