<div>
    <x-form.multi-step title="Basic Information" step="1" previous-step="" >
        {{--BEGIN: Column 1 (Photo) --}}
        <div class="col-span-12 xl:col-span-3">
            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    @if (isset($data['dependent']['photo']))
                        <img class="rounded-md" alt="" src="{{ $data['dependent']['photo']->temporaryUrl() }}">
                        <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </div>
                    @endif
                </div>
                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                    <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                    <input type="file" wire:model="data.dependent.photo" class="w-full h-full top-0 left-0 absolute opacity-0">
                    @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        {{--END: Column 1 (Photo) --}}

        {{--BEGIN: Column 2 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-3">
            <x-form.input.livewire-select model="data.dependent.relationship" label="Relationship" placeholder="Select Relationship *"  class="mb-3" wire:ignore>
                @foreach ($relationships as $relationship)
                    <option {{isset($data['dependent']['relationship']) == $relationship->id ? 'selected' : ''}}
                            value="{{$relationship->id}}"
                    >
                        {{$relationship->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>
            <x-form.input.livewire-text model="data.dependent.pin" label="Birth Certificate Pin"
                                        placeholder="Birth Certificate Pin *" class="mb-3"/>
            <x-form.input.livewire-date model="data.dependent.date_of_birth" label="Date Of Birth"
                                        placeholder="" class="mb-3"/>
        </div>
        {{--END: Column 2 --}}

        {{--BEGIN: Column 2 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-3">
            <x-form.input.livewire-text model="data.dependent.first_name" label="First Name"
                                        placeholder="First Name *" class="mb-3"/>
            <x-form.input.livewire-text model="data.dependent.last_name" label="Last Name"
                                        placeholder="Last Name" class="mb-3"/>
            <x-form.input.livewire-text model="data.dependent.other_names" label="Other Names"
                                        placeholder="Other Names" class="mb-3"/>
        </div>
        {{--END: Column 2 --}}

        {{--BEGIN: Column 3 --}}
        <div class="intro-y col-span-12 sm:col-span-6 lg:col-span-3">
            <x-form.input.livewire-select model="data.dependent.gender" label="Gender"
                                          placeholder="Select Gender *"  class="mb-3" wire:ignore>
                @foreach ($genders as $gender)
                    <option {{isset($data['dependent']['gender']) == $gender->id ? 'selected' : ''}}
                            value="{{$gender->id}}"
                    >
                        {{$gender->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.dependent.religion" label="Religion"
                                          placeholder="Select Religion *"  class="mb-3" wire:ignore>
                @foreach ($religions as $religion)
                    <option {{ isset($data['dependent']['religion'])== $religion->id ? 'selected': '' }}
                            value="{{$religion->id}}"
                    >
                        {{$religion->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-check-box model="data.dependent.is_next_of_kin" label="Next of Kin" class="mt-4"/>

        </div>
    </x-form.multi-step>
</div>
