<div class="intro-y col-span-12 sm:col-span-6 mb-3">
    <div class="flex items-center">
        <x-form.input.select-prepend select-model="data.phone.0.phone_type_id" select-placeholder="Phone Type"
                                     text-model="data.phone.0.number" text-placeholder="123-4567"
                                     label="Phone Number" class="w-5/6">
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </x-form.input.select-prepend>

        <button wire:click.prevent="add()" class="mt-5 button px-2 mr-1 bg-theme-9 text-white">
        <span class="w-5 h-5 flex items-center justify-center">
            <i data-feather="plus" class="w-4 h-4"></i>
        </span>
        </button>
    </div>

    @foreach ($inputs as $input)
        <div class="flex items-center">
            <x-form.input.select-prepend select-model="data.phone.{{$loop->iteration}}.phone_type_id"
                                         select-placeholder="Phone Type"
                                         text-model="data.phone.{{$loop->iteration}}.number"
                                         text-placeholder="123-4567" label="" class="w-5/6">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </x-form.input.select-prepend>

            <button wire:click.prevent="remove({{$loop->index}})" class="mt-5 button px-2 mr-1 bg-theme-6 text-white">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i data-feather="minus" class="w-4 h-4"></i>
                    </span>
            </button>
        </div>
    @endforeach
</div>

