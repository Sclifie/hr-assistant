<?php ?>
<div>
    @if(count($options) !== 0)
        <label for="positionId" class="block font-medium text-sm text-gray-700">{{__('Position')}}</label>
        <select name="position_id" id="positionId" wire:model="form.position_id"
                class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm
                rounded-md border bg-white focus:ring-1 focus:outline-none
                border-secondary-300 focus:ring-primary-500 focus:border-primary-500">
            @foreach($options as $option)
                <option value="{{$option->id}}">{{__('interview.'.$option->name)}}</option>
            @endforeach
        </select>
    @else
        <form wire:submit="createPosition">
            <div class="flex justify-between">
            <label for="interview_last_name" class="block font-medium text-sm text-gray-700">
                {{__('Create') . ' ' .__('Position')}}
                <input id="interview_last_name"
                       wire:model="positionName"
                       autocomplete="{{old('last_name')}}"
                       type="text"
                       name="last_name"
                       class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            </label>
            <x-input-error :messages="$errors->get('form.position_id')" class="mt-2"/>
            </div>
            <x-button>{{__('Create')}}</x-button>
        </form>
    @endif
</div>