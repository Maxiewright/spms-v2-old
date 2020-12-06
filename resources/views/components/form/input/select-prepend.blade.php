<div  {{$attributes->merge(['class' => 'intro-y col-span-12'])}} {{$attributes}} >
    <label>{{$label}}</label>
    <div {{$attributes->merge(['class' => 'flex flex-wrap items-stretch relative mt-2'])}} >
        <div class="flex -mr-px border rounded rounded-r-none @error($selectModel) border-red-500 @enderror">
            <select wire:model="{{$selectModel}}"
                    class="input w-full flex-1 "
            >
                <option value="">{{$selectPlaceholder}}</option>
                {{$slot}}
            </select>
        </div>

        <input wire:model="{{$textModel}}"
               type="text"
               class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border h-10
               border-grey-light rounded rounded-l-none px-3 relative
               @error($textModel) border border-red-500 @enderror"
               placeholder="{{$textPlaceholder}}"
        >
    </div>
    @error($selectModel) <div class="text-red-500 mt-2">{{$message}}</div> @enderror
    @error($textModel) <div class="text-red-500 mt-2">{{$message}}</div> @enderror
</div>

