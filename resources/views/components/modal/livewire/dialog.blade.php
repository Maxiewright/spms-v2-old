@props(['id' => null, 'maxWidth' => null, 'title' => null])

<x-modal :id="$id" maxWidth="md" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $slot }}
        </div>
    </div>
    <div class="px-6 py-4 bg-gray-100 text-right">
        <button
            wire:click.prevent="closeModal"
            type="button"
            class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">
            Cancel
        </button>
        <button
            wire:click.prevent="store"
            type="button"
            class="button w-20 bg-theme-1 text-white">
            Save
        </button>
    </div>
</x-modal>
