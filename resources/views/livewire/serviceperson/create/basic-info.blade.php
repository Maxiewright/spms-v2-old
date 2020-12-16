<div>
    <x-form.multi-step title="Basic Information" step="1" previous-step="" >
        {{--BEGIN: Column 1 (Photo) --}}
        <div class="col-span-12 xl:col-span-4">
            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    @if (isset($data['serviceperson']['photo']))
                        <img class="rounded-md" alt="" src="{{ $data['serviceperson']['photo']->temporaryUrl()}}">
                        <div title="Remove Photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </div>
                    @endif
                </div>
                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="button w-full bg-theme-1 text-white">
                        {{isset($data['serviceperson']['photo']) ? 'Change Photo' : 'Upload Photo'}}
                    </button>
                    <input type="file" wire:model="data.serviceperson.photo" class="w-full h-full top-0 left-0 absolute opacity-0">
                    @error('data.serviceperson.photo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        {{--END: Column 1 (Photo) --}}

        {{--BEGIN: Column 2 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-4">
            <x-form.input.livewire-text model="data.serviceperson.number" label="" placeholder="Service Number *" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.first_name" label="" placeholder="First Name *" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.middle_name" label="" placeholder="Middle Name" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.last_name" label="" placeholder="Last Name *" class="mb-3"/>
        </div>
        {{--END: Column 2 --}}

        {{--BEGIN: Column 3 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-4">
            <x-form.input.livewire-text model="data.serviceperson.other_names" label="" placeholder="Other Name" class="mb-3"/>
            <x-form.input.livewire-select model="data.serviceperson.marital_status_id" label="" placeholder="Select Marital Status *" class="mb-3">
                @foreach ($maritalStatuses as $maritalStatus)
                    <option {{isset($data['serviceperson']['marital_status_id']) == $maritalStatus->id ? 'selected' : ''}} value="{{$maritalStatus->id}}">{{$maritalStatus->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
            <x-form.input.livewire-select model="data.serviceperson.ethnicity_id" label="" placeholder="Select Ethnicity *"  class="mb-3" >
                @foreach ($ethnicities as $ethnicity)
                    <option {{isset($data['serviceperson']['ethnicity_id']) == $ethnicity->id ? 'selected' : ''}} value="{{$ethnicity->id}}">{{$ethnicity->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
            <x-form.input.livewire-select model="data.serviceperson.religion_id" label="" placeholder="Select Religion *"  class="mb-3">
                @foreach ($religions as $religion)
                    <option {{ isset($data['serviceperson']['religion_id']) == $religion->id ? 'selected': '' }} value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
        </div>
    </x-form.multi-step>
</div>






