<x-modal.livewire.dialog wire:model.defer="isOpen" title="{{$title}}">
    {{--Job title--}}
    <div class="">
        <x-form.input.livewire-select model="job_title_id" label="Job Title" placeholder="Select Job Title">
            @foreach ($jobTitles as $jobTitle)
                <option value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    {{--Job class--}}
    <div class="mt-3">
        <x-form.input.livewire-select model="class_id" label="Job Class" placeholder="Select Job Class">
            @foreach ($classes as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    {{--Substantive Rank--}}
    <div class="mt-3">
        <x-form.input.livewire-select model="rank_id" label="Substantive Rank" placeholder="Select Substantive Rank">
            @foreach ($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    {{--Career Path--}}
    <div class="mt-3">
        <x-form.input.livewire-select model="career_path_id" label="Career Path" placeholder="Select">
            @foreach ($careerPaths as $careerPath)
                <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    {{--Establishment --}}
    <div class="mt-3">
        <x-form.input.livewire-text model="establishment" label="Establishment" placeholder="Enter Establishment"/>
    </div>
    {{--Description--}}
    <div class="mt-3">
        <div class="intro-y col-span-12 cursor-pointer">
            <label>Job Description</label>
            <div
                class=" input w-full flex-1 mt-2 relative border border-dashed border-2 border-blue-700 bg-gray-100 flex items-center">
                <div class="absolute">
                    <label wire:model="jobDescriptionText"
                           class="cursor-pointer block text-gray-400 font-normal @error('jobDescription') text-red-500 @enderror"
                           for="customFile">
                        {{$jobDescriptionText}}
                    </label>
                </div>
                <input wire:model="jobDescription"
                       wire:change="$set('jobDescriptionText', $event.target.value.split('\\').pop())"
                       type="file" class="cursor-pointer h-full w-full opacity-0" id="customFile">

            </div>
        </div>

        @error('jobDescription')
        <div class="text-red-500">{{$message}}</div>
        @enderror
    </div>
</x-modal.livewire.dialog>
