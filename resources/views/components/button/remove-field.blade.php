<div {{$attributes->merge(['class' => 'mt-3'])}}>
    <button wire:click.prevent="remove({{$field}})" class="mt-5 button px-2 mr-1 bg-theme-6 text-white">
        <span class="w-5 h-5 flex items-center justify-center">
            <i data-feather="minus" class="w-4 h-4"></i>
        </span>
    </button>
</div>
