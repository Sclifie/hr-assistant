<section>
    <form class="mt-6 space-y-6" wire:submit="createInterview">
        @csrf
        <div>
            <label for="interview_first_name" class="block font-medium text-sm text-gray-700">
                {{__('Name')}}
                <input id="interview_first_name"
                       type="text"
                       wire:model.live="interviewForm.first_name"
                       autocomplete="{{old('first_name')}}"
                       name="first_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('interviewForm.first_name')" class="mt-2"/>
        </div>
        <div>
            <label for="interview_last_name" class="block font-medium text-sm text-gray-700">
                {{__('Lastname')}}
                <input id="interview_last_name"
                       wire:model.live="interviewForm.last_name"
                       autocomplete="{{old('last_name')}}"
                       type="text"
                       name="last_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('interviewForm.last_name')" class="mt-2"/>
        </div>
        <div>
            <label for="interview_email" class="block font-medium text-sm text-gray-700">
                Email
                <input id="interview_email"
                       wire:model.live="interviewForm.email"
                       type="email"
                       name="email"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('interviewForm.email')" class="mt-2"/>
        </div>
        <div class="flex flex-nowrap justify-between items-end">
            <div class="w-3/4 me-2">
                <label for="positionId" class="block font-medium text-sm text-gray-700">{{__('Position')}}</label>
                <select name="position_id" id="positionId"
                        wire:model.live="interviewForm.position_id"
                        class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm rounded-md border bg-white focus:ring-1 focus:outline-none border-secondary-300 focus:ring-primary-500 focus:border-primary-500">
                    @forelse($positionOptions as $option)
                        <option value="{{$option->id}}" >
                            {{trans()->hasForLocale('position.' . $option->name) ? __('position.' . $option->name) : $option->name}}
                        </option>
                    @empty
                        <option>Сначала создайте вакансию...</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('interviewForm.position_id')" class="mt-2"/>
            </div>
                <button type="button"
                        x-on:click="$openModal('create-position');"
                        class="h-10 transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white"
                >{{__('position.create')}}</button>
        </div>
        <div class="flex items-center justify-between gap-4">
            <button type="submit"
                    class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white">
                {{ __('Save') }}
            </button>
                <x-button warning label="Удалить интервью"
                          class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white"
                          wire:model="interviewForm.id"
                          x-data
                          x-show="$wire.interviewForm.id"
                          x-on:confirm="{
                                title: 'Вы уверены',
                                icon: 'warning',
                                method: 'deleteInterview',
                            }" />
        </div>
    </form>
{{--    Create Position Modal--}}
            <livewire:pages.position.create />
</section>
