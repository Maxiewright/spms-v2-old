<div  {{$attributes->merge(['class' => 'intro-y col-span-12'])}} >
    <label>{{$label}}</label>
    <input wire:model="{{$model}}"
           type="date"
           class="input w-full border flex-1 mt-2  @error($model) border-red-500 @enderror"
           placeholder="{{$placeholder}}"
        {{$attributes}}
    >
    @error($model)
    <div class="text-red-500 mt-1">{{$message}}</div>
    @enderror
</div>
