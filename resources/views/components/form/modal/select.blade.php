<div>
    <label class="block mt-4">
        <span class="text-gray-700">{{$label}}</span>
        <select wire:model="{{$model}}" class="input w-full border mt-1" autofocus>
            <option value="">{{$placeholder}}</option>
            {{$slot}}
        </select>
        @error($mode) <span class="text-red-500">{{ $message }}</span>@enderror
    </label>
</div>
