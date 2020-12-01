<div {{$attributes->merge(['class' => 'flex flex-wrap items-stretch mb-4 relative'])}}>
    <div class="flex -mr-px border rounded rounded-r-none">
        <select wire:model="{{$selectModel}}"
                class="input w-full  flex-1"
        >
            <option>{{$selectPlaceholder}}</option>
        </select>
    </div>
    <input wire:model="{{$textModel}}"
           type="text"
           class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10 border-grey-light rounded rounded-l-none px-3 relative"
           placeholder="{{$textPlaceholder}}"
    >
</div>
