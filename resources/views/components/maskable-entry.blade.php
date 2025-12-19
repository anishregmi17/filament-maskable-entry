<x-filament-infolists::entry-wrapper :entry="$entry">
    <div>
        <div x-data="{ show: false }" class="flex items-center gap-2 mt-1">
            <span 
                x-text="show ? '{{ $getFormattedValue() }}' : '{{ $getMaskedValue() }}'"
                class="font-mono"
            ></span>
            @if ($getFormattedValue() !== 'N/A' && $isToggleable())
                <button 
                    type="button" 
                    x-on:click="show = !show" 
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500 rounded"
                    aria-label="Toggle value visibility"
                    x-bind:aria-pressed="show.toString()"
                >
                    <x-filament::icon 
                        :icon="$getShowIcon()" 
                        x-show="!show" 
                        class="w-5 h-5" 
                        aria-hidden="true"
                    />
                    <x-filament::icon 
                        :icon="$getHideIcon()" 
                        x-show="show" 
                        class="w-5 h-5"
                        style="display: none;"
                        aria-hidden="true"
                    />
                </button>
            @endif
        </div>
    </div>
</x-filament-infolists::entry-wrapper>
