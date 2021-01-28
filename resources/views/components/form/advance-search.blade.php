<div class="intro-y box col-span-12 md:col-span-6 p-5 mt-5 bg-green-400">
    <div class="grid grid-cols-12 gap-4 gap-y-3">
        {{$filters}}
        <div class="col-span-12 flex items-center mt-3">
            <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 mr-2 sm:mt-0">
                <div class="mr-3">Show timestamps</div>
                <input wire:model="timestamps" type="checkbox" class="input input--switch border">
            </div>
            <button wire:click="resetFilters"
                class="button w-32 justify-center block bg-gray-200 text-gray-600 dark:bg-dark-1 dark:text-gray-300 ">
                Reset Filters
            </button>
        </div>
    </div>
</div>
