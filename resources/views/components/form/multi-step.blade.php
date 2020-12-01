<div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
    <div class="font-medium text-base">{{$title}}</div>
    <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
        {{$slot}}
        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
            @if ($step > 1)
                <button
                    wire:click.prevent="$emit('goToStep', {{$previousStep}})"
                    class="button w-24 justify-center block bg-gray-200 text-gray-600 dark:bg-dark-1 dark:text-gray-300">
                    Previous
                </button>
            @endif
            <button
                wire:click.prevent="submit"
                class="button w-24 justify-center block bg-theme-1 text-white ml-2">
                Next
            </button>
        </div>
    </div>
</div>
