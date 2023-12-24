<div>
    <label for="status" class="block font-medium text-sm text-gray-700">{{$label}}</label>
    <select name="status" id="status"
            class="form-select block w-full pl-3 pr-10 py-2 text-base sm:text-sm shadow-sm
                rounded-md border bg-white focus:ring-1 focus:outline-none
                dark:bg-secondary-800 dark:border-secondary-600 dark:text-secondary-400 border-secondary-300 focus:ring-primary-500 focus:border-primary-500"
    >
        @foreach($statuses as $status)
            <option value="{{$status->value}}">{{$status->translation()}}</option>
        @endforeach
    </select>
</div>