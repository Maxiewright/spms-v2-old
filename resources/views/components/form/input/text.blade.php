<div>
    <input wire:model="{{$model}}"
           type="text"
           class="input w-full border flex-1  @error($model) is-invalid @enderror"
           placeholder="{{$placeholder}}"
        {{$attributes}}
    >
    @error($model)
        <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

