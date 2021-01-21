<div class="overflow-auto fixed  inset-0 ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-full"></span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            {{-- BEGIN: Header --}}
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">{{$title}}</h2>
            </div>
            {{-- END: Header --}}

            {{-- BEGIN: Action Btns --}}
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                {{$slot}}
            </div>
            {{-- END: Form --}}

            {{-- BEGIN: Action Btns --}}
            <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
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
            {{-- END: Action Btns --}}
        </div>
    </div>
</div>
