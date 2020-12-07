<div {{$attributes->merge(['class' => ''])}}>
    <button wire:click.prevent="add()" class="mt-5 button px-2 mr-1 bg-theme-9 text-white">
        <span class="w-5 h-5 flex items-center justify-center">
            <i data-feather="plus" class="w-4 h-4"></i>
        </span>
    </button>
</div>


