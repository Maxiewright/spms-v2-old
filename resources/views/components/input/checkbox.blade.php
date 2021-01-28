{{--@props(['id'=>null, 'label'=>null, 'model'=>null, 'value' => 1, 'name'=>null])--}}

{{--<div {{$attributes->merge(['class' => 'flex items-center text-gray-700 dark:text-gray-500'])}}>--}}
{{--    <input wire:model="{{$model}}" type="checkbox" class="input border mr-2" id="{{$id}}" value="{{$value}}" name="{{$name}}">--}}
{{--    <label class="cursor-pointer select-none" for="vertical-remember-me">--}}
{{--        {{$label}}--}}
{{--    </label>--}}
{{--</div>--}}

<div class="flex items-center text-gray-700 dark:text-gray-500">
    <input {{ $attributes }}
           type="checkbox"
           class="flex items-center text-gray-700 dark:text-gray-500"
    />
</div>
