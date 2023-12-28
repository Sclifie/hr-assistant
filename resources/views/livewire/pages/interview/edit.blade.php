<div>
    <section>
        <header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{__('Edit :name', ['name' => __('interview.Interview')])}} # {{$interviewForm->id}}
            </h2>
        </header>
        <form class="mt-6 space-y-6"
              wire:submit="updateInterview">
            <div>
                <label for="interview_first_name" class="block font-medium text-sm text-gray-700">
                    {{__('Name')}}
                    <input id="interview_first_name"
                           type="text"
                           wire:model="interviewForm.first_name"
                           value="interviewForm.first_name"
                           name="first_name"
                           class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </label>
                <x-input-error :messages="$errors->get('interviewForm.first_name')" class="mt-2"/>
            </div>
            <div>
                <label for="interview_last_name" class="block font-medium text-sm text-gray-700">
                    {{__('Lastname')}}
                    <input id="interview_last_name"
                           value="interviewForm.last_name"
                           wire:model="interviewForm.last_name"
                           type="text"
                           name="last_name"
                           class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </label>
                <x-input-error :messages="$errors->get('interviewForm.last_name')" class="mt-2"/>
            </div>
            <div>
                <label for="interview_email" class="block font-medium text-sm text-gray-700">
                    Email
                    <input id="interview_first_name"
                           value="interviewForm.email"
                           wire:model="interviewForm.email"
                           type="email"
                           name="email"
                           class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                </label>
                <x-input-error :messages="$errors->get('interviewForm.email_name')" class="mt-2"/>
            </div>
            <div>
                <label for="positionId" class="block font-medium text-sm text-gray-700">{{__('Position')}}</label>
                <select name="position_id" id="positionId"
                        wire:model="interviewForm.position_id"
                        class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm rounded-md border bg-white focus:ring-1 focus:outline-none border-secondary-300 focus:ring-primary-500 focus:border-primary-500">
                    @foreach($positionOptions as $option)
                        <option value="{{$option->id}}" {{$option->id === old('option') || $interviewForm->id ? 'selected' : ''}}>{{__('interview.'.$option->name)}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('interviewForm.position_id')" class="mt-2"/>
            </div>
            <div>
                <label for="statusName" class="block font-medium text-sm text-gray-700">{{__('Status')}}</label>
                <select name="status_name" id="statusName"
                        {{$interviewForm->status === \App\Enums\InterviewStatusesEnum::PASSED->value ? 'disabled' : ''}}
                        wire:model="interviewForm.status"
                        class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm rounded-md border bg-white focus:ring-1 focus:outline-none border-secondary-300 focus:ring-primary-500 focus:border-primary-500">
                    @foreach($statusOptions as $option)
                        <option value="{{$option->value}}" {{$option->value === $interviewForm->status ? 'selected' : ''}}>{{$option->translation()}}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('interviewForm.position_id')" class="mt-2"/>
                @if($interviewForm->status === \App\Enums\InterviewStatusesEnum::PASSED->value)
                    <span class="text-xs text-red-300">{{__('interview.passed-notice')}}</span>
                @endif
            </div>
            <div class="flex items-center gap-4">
                <x-button type="submit">{{__('Save')}}</x-button>
            </div>
        </form>
    </section>
</div>