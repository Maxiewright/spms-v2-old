<div>
    <x-form.multi-step title="Contact" step="2" previous-step="1">
        <div class="intro-y col-span-12 sm:col-span-6">
            <x-form.input.livewire-text model="data.address.address1" placeholder="Address Line 1"/>
        </div>
        <div class="intro-y col-span-12 sm:col-span-6">
            <x-form.input.livewire-text model="data.address.address2" placeholder="Address Line 2"/>
        </div>
        {{--BEGIN: Division or Region--}}
        <div class="intro-y col-span-12 sm:col-span-6" wire:ignore>
            <x-form.input.livewire-select model="data.address.divisionId" placeholder="Select Division or Region">
                @foreach($divisions as $division)
                    <option {{$divisionId == $division->id ? 'selected' : ''}}
                            value="{{$division->id}}">{{$division->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>
        </div>
        {{--END: Division or Region--}}
        {{--BEGIN: City or Town--}}
        <div class="intro-y col-span-12 sm:col-span-6">
            <x-form.input.livewire-select
                model="data.address.cityId"
                placeholder="{{isset($data['divisionId']) ? 'Select City or Town' : 'Select Division or Region First'}}">
                @foreach($cities as $city)
                    <option {{$cityId == $city->id ? 'selected' : ''}}
                            value="{{$city->id}}">{{$city->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>
            {{--END: City or Town--}}
        </div>
        {{--    Phone and Email--}}
        {{--BEGIN: Email Input--}}
        <div class="intro-y col-span-12 sm:col-span-6 mb-3">
            <div class="flex">
                <x-form.input.select-prepend select-model="phoneTypeId.0" select-placeholder="Email Type"
                                             text-model="phoneAddress.0" text-placeholder="Email Address"
                                             class="w-5/6"/>
                <div class="mx-auto ">
                    <button wire:click="addPhone({{$phone}})" class="button px-2 mr-1 mb-2 bg-theme-9 text-white">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i data-feather="plus" class="w-4 h-4"></i>
                    </span>
                    </button>
                </div>
            </div>
            @foreach ($phoneInputs as $key => $value)
            <div class="flex mb-3">
                <x-form.input.select-prepend select-model="phoneTypeId.0" select-placeholder="Email Type" text-model="phoneAddress.0"
                                             text-placeholder="Email Address" class="w-5/6"/>
                <div class="mx-auto ">
                    <button wire:click="removePhone({{$key}})" class="button px-2 mr-1 mb-2 bg-theme-6 text-white">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i data-feather="minus" class="w-4 h-4"></i>
                    </span>
                    </button>
                </div>

            </div>
            @endforeach
        </div>



        {{--                END: Email Input--}}
        {{--            </div>--}}

        {{--            <div class="row-end-auto">--}}
        {{--            BEGIN: Email Input --}}
        <div class="intro-y flex col-span-12 sm:col-span-6 mb-3">
            <div class="flex-auto">
                <div class="relative">
                    <div
                        class="absolute top-0 left-0 rounded-l w-30 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">
                        <select wire:model="emailTypeId.0" class="input w-full  flex-1">
                            <option>Email Type</option>
                        </select>
                    </div>
                    <div class="pl-10">
                        <input wire:model="emailAddress.0" type="text" class="input pl-20 w-5/6 border col-span-4"
                               placeholder="Email Address">
                    </div>
                </div>
            </div>
            <button wire:click="addEmail({{$email}})" class="button px-2 mr-1 mb-2 bg-theme-9 text-white">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i data-feather="plus" class="w-4 h-4"></i>
                </span>
            </button>

        </div>
        @foreach ($emailInputs as $key => $value)
            <div class="intro-y flex col-span-12 sm:col-span-6 mb-3">
                <div class="flex-auto">
                    <div class="relative">
                        <div
                            class="absolute top-0 left-0 rounded-l w-30 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">
                            <select wire:model="emailTypeId.{{$value}}" class="input w-full  flex-1">
                                <option>Email Type</option>
                            </select>
                        </div>
                        <div class="pl-10">
                            <input wire:model="emailAddress.{{$value}}" type="text"
                                   class="input pl-20 w-5/6 border col-span-4"
                                   placeholder="Email Address">
                        </div>
                    </div>
                </div>

                <button wire:click.prevent="removeEmail({{$key}})" class="button px-2 mr-1 mb-2 bg-theme-6 text-white">
                         <span class="w-5 h-5 flex items-center justify-center">
                            <i data-feather="minus" class="w-4 h-4"></i>
                        </span>
                </button>
            </div>
    @endforeach
    {{--            END: Email Input--}}

</div>
</x-form.multi-step>
</div>




