<div>

    <div class="font-medium text-base">Identification</div>
    <form wire:submit.prevent="store">
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
            <div class="intro-y col-span-12 sm:col-span-6">
                <x-form.input.livewire-text model="data.thing" placeholder="This thing"/>
            </div>

            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                <button
                    wire:click.prevent="$emit('goToStep', 2)"
                    class="button w-24 justify-center block bg-gray-200 text-gray-600 dark:bg-dark-1 dark:text-gray-300">
                    Previous
                </button>
                <button wire:click.prevent="submit" type="submit"
                        class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save
                </button>
            </div>
        </div>
    </form>


</div>
