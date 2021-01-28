@props(['field' => 'null', 'title'=>null, 'icon' => null, 'menuItem'])

<a wire:click="setMenuItem('{{$field}}')"
   href="#"
   class="flex items-center px-3 py-2 mt-2 rounded-md
   @if($menuItem == $field ) ttr-bg-theme text-white font-medium @endif">
    <i class="w-4 h-4 mr-2" data-feather="{{$icon}}"></i> {{$title}}
</a>
