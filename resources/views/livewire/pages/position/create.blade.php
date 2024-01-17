<x-modal name="create-position"
         x-on:close="$wire.dispatch('interview-update')"
>
    <x-card title="{{__('position.create')}}">
        <div>
            @if( $saved )
                {{__('Saved.')}}
            @endif
            <form wire:submit="savePosition">
                <x-input class="mb-6" :label="'Позиция'" wire:model.live="positionForm.name"/>
                <button type="submit"
                        wire:click="savePosition"
                        class="transition ease-in-out bg-green-500 hover:bg-green-700 px-4 py-2 text-white">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </x-card>
</x-modal>