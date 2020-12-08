<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.course.type" placeholder="Select Type"
                                  label="Course Type" class=" sm:col-span-4">
        @foreach($types as $type)
            <option
                value="{{$type->id}}">{{$type->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.course.institution"
                                  placeholder="{{isset($data['course']['type']) ? 'Select Institution' : 'Select Type First'}}"
                                  label="Course Institution" class="sm:col-span-4">
        @foreach($institutions as $institution)
            <option
                value="{{$institution->id}}">{{$institution->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.course.course"
                                  placeholder="{{isset($data['course']['institution']) ? 'Select Course' : 'Select Institution First'}} "
                                  label="Course" class="sm:col-span-4">
        @foreach($courses as $course)
            <option
                value="{{$course->id}}">{{$course->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-text model="data.course.place" label="Place" placeholder="Place" class="sm:col-span-2"/>

    <x-form.input.livewire-select model="data.course.qualification" placeholder="Select Qualification"
                                  label="Qualification" class="sm:col-span-4">
        @foreach($qualifications as $qualification)
            <option
                value="{{$qualification->id}}">{{$qualification->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.course.started_on" label="Start Date"
                                placeholder="Start Date" class=" sm:col-span-2"/>

    <x-form.input.livewire-date model="data.course.completed_on" label="End Date"
                                placeholder="End Date" class=" sm:col-span-2"/>

    <x-buttons.add-field />
</div>
