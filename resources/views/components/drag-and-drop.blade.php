<div class="w-full">
    <button class="w-full text-center p-2 mb-4">
        <img wire:click="removeImage" alt="Временное фото профиля" class="cursor-pointer hover:shadow-lg ml-auto mr-auto h-36 w-28 object-cover" src="{{ $image ? $image->temporaryUrl() : 'https://placehold.co/600x400/f3f3f3/e3e3e3?text=No\nPhoto'}}">
    </button>
    <div class="w-full flex justify-center items-center"
         x-data="dragAndDrop()">
        <div class="relative" x-on:mouseover="info($event)">
            <div x-on:dragover.prevent="dragOver"
                 x-on:dragleave.prevent="dragIn"
                 x-on:drop.prevent="drop($event)"
                 x-on:mouseover="info($event)"
                 class="h-48 w-48 bg-gray-100 border-2 border-gray-300 rounded border-dashed text-gray-400 inline-flex flex-col items-center justify-center text-center">
                <p class="mb-2">Поместите файлы сюда</p>
                <x-icon name="folder-download" outline class="w-5 h-5" />
            </div>
            <div x-show="upload" class="absolute w-full justify-center items-center flex z-10 h-full top-0">
                <svg  width="100" height="100"
                      style="transform: rotate(-90deg)"
                      viewBox="0 0 100 100"
                      id="upload-progress-circle">
                    <circle r="40" cx="50" cy="50" fill="transparent" stroke="#e0e0e0" stroke-width="12px"></circle>
                    <circle r="40" cx="50" cy="50" fill="transparent" stroke="#22c55e" stroke-width="12px" stroke-dasharray="251.2px" stroke-dashoffset=""></circle>
                </svg>
                <div class="absolute flex justify-center items-center w-full h-full top-0 text-gray-500"><span x-text="progress"></span></div>
            </div>
        </div>
    </div>
</div>
@push('head')
    @vite(['resources/js/dragdrop.js'])
@endpush