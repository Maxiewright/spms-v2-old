<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.education.level" placeholder="Select Level"
                                  label="Education Level" class=" sm:col-span-4">
        @foreach($levels as $level)
            <option
                value="{{$level->id}}">{{$level->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.education.subject"
                                  placeholder="{{isset($data['education']['level']) ? 'Select Subject' : 'Select Level First'}}"
                                  label="Subjects" class="sm:col-span-4">
        @foreach($subjects as $subject)
            <option
                value="{{$subject->id}}">{{$subject->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.education.grade"
                                  placeholder="{{isset($data['education']['level']) ? 'Select Grade' : 'Select Level First'}} "
                                  label="Grade" class="sm:col-span-4">
        @foreach($grades as $grade)
            <option
                value="{{$grade->id}}">{{$grade->grade}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.education.district" placeholder="Select District"
                                  label="School District" class=" sm:col-span-4">
        @foreach($districts as $district)
            <option
                value="{{$district->id}}">{{$district->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.education.school"
                                  placeholder="{{isset($data['education']['district']) ? 'Select School' : 'Select District First'}} "
                                  label="School" class="sm:col-span-4">
        @foreach($schools as $school)
            <option
                value="{{$school->id}}">{{$school->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.education.completed_on" label="Completion Date"
                                placeholder="Completion Date" class=" sm:col-span-2"/>

    <x-buttons.add-field />
</div>

