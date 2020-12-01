<div {{$attributes->merge(['class' => ''])}}>
    <select wire:model="{{$model}}" class="input w-full border flex-1 @error($model) is-invalid @enderror" {{$attributes}}>
        <option value="">{{$placeholder}}</option>
        {{$slot}}
    </select>
    @error($model) <div class="text-red-500 mt-2">{{$message}}</div> @enderror
</div>
