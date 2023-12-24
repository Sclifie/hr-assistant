<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Управление интервью #{{$interview->id}}
        </h2>
    </header>
    <form wire:submit="updateInterview" class="mt-6 space-y-6">
        <div>
            <x-input-label for="interview_first_name">
                Имя
            </x-input-label>
            <x-text-input wire:model="$interview->first_name"
                          value="{{$interview->first_name}}"
                          id="interview_first_name"
                          name="first_name"
                          class="mt-1 block w-full"
                          autocomplete="{{$interview->first_name}}"/>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>
        <div>
            <x-input-label for="interview_last_name">
                Фамилия
            </x-input-label>
            <x-text-input wire:model="{{$interview->last_name}}"
                          value="{{$interview->last_name}}"
                          id="interview_last_name"
                          name="name"
                          class="mt-1 block w-full"
                          autocomplete="{{$interview->last_name}}"/>
            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>
        <div>
            <x-input-label for="interview_email">
                Email
            </x-input-label>
            <x-text-input wire:model="{{$interview['email']}}"
                          value="{{$interview['email']}}"
                          id="interview_email"
                          name="name"
                          type="email"
                          class="mt-1 block w-full"
                          autocomplete="{{$interview->email}}"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>
        <div>
            <x-native-select label="Выберите позицию"
                             :options="\App\Models\Position::all()->toArray()"
                             wire:model="{{$interview['position_id']}}"
                             option-label="name"
                             option-value="id"/>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2"/>
        </div>
        <div>
            <x-input-label for="interview_status">
                Статус
            </x-input-label>
            <x-native-select wire:model="{{$interview['status']}}"
                             option-value="value"
                             option-label="value"
                             value="{{$interview['status']}}"
                             id="interview_status"
                             name="name"
                             type="email"
                             class="mt-1 block w-full"
                             autocomplete="{{$interview->status}}">
                @foreach(\App\Enums\InterviewStatusesEnum::cases() as $status)
                    <x-select.option :value="$status->value">{{$status->translation()}}</x-select.option>
                @endforeach
            </x-native-select>
            <x-input-error :messages="$errors->get('')" class="mt-2"/>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="name-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
