<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interviews') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-2">
                    @forelse($interviews ?? [] as $interview)
                        <div class="mb-2 bg-gray-100 p-2 flex justify-between leading-none items-center">
                            <h3 class="text-lg">Интервью на позицию {{$interview->position->name}}</h3>
                            <a href="{{route('interview.edit',['interview' => $interview->path()])}}"
                               class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white"
                            >Перейти к интервью</a>
                        </div>
                    @empty
                        <p>Пока нет ни одного назначенного интервью, создать интерьвью Вы можете по <a class="transition ease-in-out text-green-500 hover:text-green-700" href="{{route('interview.create')}}">ссылке</a></p>
                    @endforelse
                        <div class="p-2 my-8 bg-gray-100 flex justify-end">
                            <a class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white" href="{{route('interview.create')}}">Создать интервью</a>
                        </div>
                        <div>
                            @if(! is_null($interviews) )
                                {{$interviews?->links()}}
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>