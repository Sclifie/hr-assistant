<section>
    <header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('Edit :name', ['name' => __('interview.Interview')])}} # {{$interview->id}}
        </h2>
    </header>
    <form class="mt-6 space-y-6"
          action="{{route('interview.update',['interview' => $interview->id])}}">
        @csrf
        <div>
            <label for="interview_first_name" class="block font-medium text-sm text-gray-700">
                {{__('Name')}}
                <input id="interview_first_name"
                       type="text"
                       value="{{$interview->first_name}}"
                       autocomplete="{{old('first_name')}}"
                       name="first_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>
        <div>
            <label for="interview_last_name" class="block font-medium text-sm text-gray-700">
                {{__('Lastname')}}
                <input id="interview_last_name"
                       value="{{$interview->last_name}}"
                       autocomplete="{{old('last_name')}}"
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
                       value="{{$interview->email}}"
                       type="email"
                       name="email"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('email_name')" class="mt-2"/>
        </div>
        <div>
            <livewire:position-select value="{{$interview->email}}"/>
            <x-input-error :messages="$errors->get('position_id')" class="mt-2"/>
        </div>
        <div>
            <livewire:interview-status-select value="{{$interview->email}}"/>
            <x-input-error :messages="$errors->get('status')" class="mt-2"/>
        </div>
        <div class="flex items-center gap-4">
            <x-button type="submit">{{__('Save')}}</x-button>
        </div>
    </form>
</section>
