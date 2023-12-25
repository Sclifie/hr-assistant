<?php ?>
<div>
    <label for="positionId" class="block font-medium text-sm text-gray-700">{{$label}}</label>
    <select name="position_id" id="positionId"
            class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm
                rounded-md border bg-white focus:ring-1 focus:outline-none
                border-secondary-300 focus:ring-primary-500 focus:border-primary-500">
        @foreach($options as $option)
            <option value="{{$option->id}}" {{$option->id === old('option') || $value ? 'selected' : ''}}>{{__('interview.'.$option->name)}}</option>
        @endforeach
    </select>
</div>