<div {{$attributes->merge(['class' => 'intro-y col-span-12'])}}>
    <label>{{$label}}</label>
    <select
        wire:model="{{$model}}"
        class="input w-full border flex-1 mt-2 @error($model) border-red-500 @enderror"
        {{$attributes}}
    >
        <option value="">{{$placeholder}}</option>
        {{$slot}}
    </select>
    @error($model)
    <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

