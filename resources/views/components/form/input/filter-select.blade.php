<select wire:model="{{$model}}" data-placeholder="{{$placeholder}}" class="input border border-gray-300 box pr-10 w-full">
    <option value="" disabled>{{$placeholder}}</option>
    {{$slot}}
</select>
