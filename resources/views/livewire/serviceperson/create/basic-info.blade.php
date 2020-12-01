<div>
    <x-form.multi-step title="Basic Information" step="1" previous-step="" >
        {{--BEGIN: Column 1 (Photo) --}}
        <div class="col-span-12 xl:col-span-4">
            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    @if (isset($data['photo']))
                        <img class="rounded-md" alt="" src="{{ $data['photo']->temporaryUrl() }}">
                        <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </div>
                    @endif
                </div>
                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                    <input type="file" wire:model="data.photo" class="w-full h-full top-0 left-0 absolute opacity-0">
                    @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        {{--END: Column 1 (Photo) --}}

        {{--BEGIN: Column 2 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-4">
            <x-form.input.livewire-text model="data.serviceperson.number" placeholder="Service Number *" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.firstName" placeholder="First Name *" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.middleName" placeholder="Middle Name" class="mb-3"/>
            <x-form.input.livewire-text model="data.serviceperson.lastName" placeholder="Last Name *" class="mb-3"/>
        </div>
        {{--END: Column 2 --}}

        {{--BEGIN: Column 3 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-4">
            <x-form.input.livewire-text model="data.serviceperson.otherNames" placeholder="Other Name" class="mb-3"/>
            <x-form.input.livewire-select model="" placeholder="Select Ethnicity *"  class="mb-3" wire:ignore>
                @foreach ($ethnicities as $ethnicity)
                    <option {{isset($data['ethnicityId']) == $ethnicity->id ? 'selected' : ''}} value="{{$ethnicity->id}}">{{$ethnicity->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
            <x-form.input.livewire-select model="" placeholder="Select Religion *"  class="mb-3" wire:ignore>
                @foreach ($religions as $religion)
                    <option {{ isset($data['religionId']) == $religion->id ? 'selected': '' }} value="{{$religion->id}}">{{$religion->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
            <x-form.input.livewire-select model="" placeholder="Select Marital Status *" class="mb-3" wire:ignore>
                @foreach ($maritalStatuses as $maritalStatus)
                    <option {{isset($data['maritalStatusId']) == $maritalStatus->id ? 'selected' : ''}} value="{{$maritalStatus->id}}">{{$maritalStatus->name}}</option>
                @endforeach
            </x-form.input.livewire-select>
        </div>
    </x-form.multi-step>
</div>






