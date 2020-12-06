<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.livewire-select model="data.job.branch" placeholder="Select Branch"
                                  label="Branch" class=" sm:col-span-4">
        @foreach($branches as $branch)
            <option
                value="{{$branch->id}}">{{$branch->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.job.stream"
                                  placeholder="{{isset($data['job']['branch']) ? 'Select Stream' : 'Select Branch First'}}"
                                  label="Stream" class="sm:col-span-4">
        @foreach($streams as $stream)
            <option
                value="{{$stream->id}}">{{$stream->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.job.career_path"
                                  placeholder="{{isset($data['job']['stream']) ? 'Select Career Path' : 'Select Stream First'}} "
                                  label="Career Path" class="sm:col-span-4">
        @foreach($careerPaths as $careerPath)
            <option
                value="{{$careerPath->id}}">{{$careerPath->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.job.speciality"
                                  placeholder="{{isset($data['job']['career_path']) ? 'Select Speciality' : 'Select Career Path First'}}"
                                  label="Speciality" class="sm:col-span-4">
        @foreach($specialities as $speciality)
            <option
                value="{{$speciality->id}}">{{$speciality->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.job.job"
                                  placeholder="{{isset($data['job']['career_path']) ? 'Select Job' : 'Select Career Path First'}} "
                                  label="Job" class="sm:col-span-4">
        @foreach($jobs as $job)
            <option
                value="{{$job->id}}">{{$job->slug}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.job.start_date" label="Start Date"
                                placeholder="Start Date" class=" sm:col-span-2"/>
</div>
