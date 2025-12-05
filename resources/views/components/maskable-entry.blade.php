<x-filament-infolists::entry-wrapper :entry="$entry">
    <div>
        <div class="text-sm font-medium text-black-500">{{ $getLabel() }}</div>
        <div x-data="{ show: false }" class="flex items-center gap-2 mt-1">
            <span x-text="show ? '{{ $getFormattedValue() }}' : '{{ $getMaskedValue() }}'"></span>
            @if ($getFormattedValue() !== 'N/A')
                <button type="button" x-on:click="show = !show" class="text-black-100 hover:text-black-100">
                    <x-filament::icon icon="heroicon-o-eye" x-show="!show" class="w-5 h-5" />
                    <x-filament::icon icon="heroicon-o-eye-slash" x-show="show" class="w-5 h-5" />
                </button>
            @endif
        </div>
    </div>
</x-filament-infolists::entry-wrapper>