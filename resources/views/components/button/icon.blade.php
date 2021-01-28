@props(['icon' => null, 'label'])

<button {{$attributes->merge(['class' => 'button w-1/2 mr-2 mb-2 flex items-center justify-center border text-gray-700 dark:border-dark-5 dark:text-gray-300'])}}
    <i data-feather="{{$icon}}" class="w-4 h-4 mr-2"></i> {{$label}}
</button>
