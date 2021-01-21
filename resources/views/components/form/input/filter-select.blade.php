<select wire:model="{{$model}}" data-placeholder="{{$placeholder}}" class="input box pr-10 w-full">
    <option value="">{{$placeholder}}</option>
    {{$slot}}
</select>
