<div>
    @foreach ($inputs as $input)
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
            <x-form.input.livewire-select model="data.serviceperson_job.{{$loop->index}}.branch_id" placeholder="Select Branch"
                                          label="Branch" class=" sm:col-span-4">
                @foreach($branches as $branch)
                    <option
                        value="{{$branch->id}}">{{$branch->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.serviceperson_job.{{$loop->index}}.stream_id"
                                          placeholder="{{isset($data['serviceperson_job']['branch_id']) ? 'Select Stream' : 'Select Branch First'}}"
                                          label="Stream" class="sm:col-span-4">
                @foreach($streams as $stream)
                    <option
                        value="{{$stream->id}}">{{$stream->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.serviceperson_job.{{$loop->index}}.career_path_id"
                                          placeholder="{{isset($data['serviceperson_job']['stream_id']) ? 'Select Career Path' : 'Select Stream First'}} "
                                          label="Career Path" class="sm:col-span-4">
                @foreach($careerPaths as $careerPath)
                    <option
                        value="{{$careerPath->id}}">{{$careerPath->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.serviceperson_job.{{$loop->index}}.speciality_id"
                                          placeholder="{{isset($data['serviceperson_job']['career_path_id']) ? 'Select Speciality' : 'Select Career Path First'}}"
                                          label="Speciality" class="sm:col-span-4">
                @foreach($specialties as $speciality)
                    <option
                        value="{{$speciality->id}}">{{$speciality->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-select model="data.serviceperson_job.{{$loop->index}}.job_id"
                                          placeholder="{{isset($data['serviceperson_job']['career_path_id']) ? 'Select Job' : 'Select Career Path First'}} "
                                          label="Job" class="sm:col-span-4">
                @foreach($jobs as $job)
                    <option
                        value="{{$job->id}}">{{$job->slug}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-date model="data.serviceperson_job.{{$loop->index}}.started_on" label="Start Date"
                                        placeholder="Start Date" class=" sm:col-span-2"/>

            {{--    <x-form.input.livewire-date model="data.serviceperson_job.{{$loop->index}}.ended_on" label="End Date"--}}
            {{--                                placeholder="End Date" class=" sm:col-span-2"/>--}}

            {{--Add / Remove Btns --}}
            @if ($input > 1)
                <x-buttons.remove-field field="{{$loop->index}}"/>
            @else
                <x-buttons.add-field/>
            @endif
        </div>
    @endforeach
</div>


