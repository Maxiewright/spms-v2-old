<div  {{$attributes->merge(['class' => 'intro-y col-span-12'])}} >
    <label>{{$label}}</label>
    <div class="mt-2">
         <textarea wire:model="{{$model}}" cols="{{$cols}}" rows="{{$rows}}" class="input border">

        </textarea>
    </div>
    @error($model)
    <div class="text-red-500 mt-1">{{$message}}</div>
    @enderror
</div>
