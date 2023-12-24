<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{__('Interview Creating')}}
        </h2>
    </header>
    <form class="mt-6 space-y-6" method="POST" action="{{route('interview.store')}}">
        @csrf
        <div>
            <label for="interview_first_name" class="block font-medium text-sm text-gray-700">
                Имя
                <input id="interview_first_name"
                       type="text"
                       name="first_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>
        <div>
            <label for="interview_last_name" class="block font-medium text-sm text-gray-700">
                Фамилия
                <input id="interview_last_name"
                       type="text"
                       name="last_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>
        <div>
            <label for="interview_email" class="block font-medium text-sm text-gray-700">
                Email
                <input id="interview_first_name"
                       type="email"
                       name="email"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('email_name')" class="mt-2"/>
        </div>
        <div>
            <livewire:position-select />
            <x-input-error :messages="$errors->get('position_id')" class="mt-2"/>
        </div>
        <div>
            <livewire:interview-status-select />
            <x-input-error :messages="$errors->get('status')" class="mt-2"/>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="name-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
