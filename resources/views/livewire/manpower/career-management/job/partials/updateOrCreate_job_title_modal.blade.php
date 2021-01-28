<x-modal.livewire.dialog wire:model.defer="isOpen" title="{{$title}}">
    {{--Job title category--}}
    <div class="">
        <x-form.input.livewire-select model="job_title_category_id" label="Job Title" placeholder="Select Job Title">
            @foreach ($jobTitleCategories as $jobTitleCategory)
                <option value="{{$jobTitleCategory->id}}">{{$jobTitleCategory->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    {{--Name --}}
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Job Tile" placeholder="Enter Job Tile"/>
    </div>
    {{--Name --}}
    <div class="mt-3">
        <x-form.input.livewire-text model="slug" label="Job Title Abbreviation" placeholder="Enter Job Title Abbreviation"/>
    </div>
    {{--Description--}}
    <div class="mt-3">
        <x-form.input.livewire-textarea model="slug" label="Job Title Description" cols="60" rows="2"/>
    </div>
</x-modal.livewire.dialog>

