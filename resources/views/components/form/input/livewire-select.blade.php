<div wire:key="{{$model}}" {{$attributes->merge(['class' => 'intro-y col-span-12'])}} {{$attributes}} >
    <label>{{$label}}</label>
    <select
        wire:model="{{$model}}"
        class="input w-full border flex-1 mt-2 @error($model) is-invalid @enderror"
        {{$attributes}}
    >
        <option value="">{{$placeholder}}</option>
        {{$slot}}
    </select>
    @error($model) <div class="text-red-500 mt-2">{{$message}}</div> @enderror
</div>
