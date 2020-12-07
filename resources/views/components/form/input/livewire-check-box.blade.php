<div  {{$attributes->merge(['class' => 'intro-y col-span-6'])}} >
    <label>{{$label}}</label>
    <div class="mt-2">
        <input wire:model="{{$model}}"
               type="checkbox"
               class="input input--switch border">
    </div>
    @error($model)
    <div class="text-red-500 mt-1">{{$message}}</div>
    @enderror
</div>
