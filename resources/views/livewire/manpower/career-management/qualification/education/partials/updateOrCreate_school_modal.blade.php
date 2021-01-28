<x-modal.livewire.dialog title="{{$title}}">
    <div>
        <x-form.input.livewire-select model="schoolTypeId" label="School Type" placeholder="Select Type">
            @foreach($schoolTypes as $schoolType)
                <option value="{{$schoolType->id}}">{{$schoolType->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-select model="schoolDistrictId" label="School District" placeholder="Select District">
            @foreach($schoolDistricts as $schoolDistrict)
                <option {{$schoolDistrictId == $schoolDistrict->id ? 'selected': ''}} value="{{$schoolDistrict->id}}">{{$schoolDistrict->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text model="name" label="Name" placeholder="Enter School Name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-textarea model="description" label="Description" rows="1" cols="" />
    </div>
</x-modal.livewire.dialog>

