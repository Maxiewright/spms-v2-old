<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.job.partials.updateOrCreate_job_modal')
        @endif
        <x-slot name="filters">
            <div class="col-span-6">
                <x-form.input.filter-select model="filterTitle" placeholder="Filter by Title">
                    @foreach ($jobTitles as $jobTitle)
                        <option
                            {{$jobTitleId == $jobTitle->id ? 'selected' : ''}} value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                    @endforeach
                </x-form.input.filter-select>
            </div>
            {{--Job class--}}
            <div class="col-span-6">
                <x-form.input.filter-select model="filterClass" placeholder="Filter by Class">
                    @foreach ($classes as $class)
                        <option
                            {{$classId == $class->id ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                </x-form.input.filter-select>
            </div>
            {{--Substantive Rank--}}
            <div class="col-span-6">
                <x-form.input.filter-select model="filterRank" placeholder="Filter by Rank">
                    @foreach ($ranks as $rank)
                        <option
                            {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
                    @endforeach
                </x-form.input.filter-select>
            </div>

            {{--Career Path--}}
            <div class="col-span-6">
                <x-form.input.filter-select model="filterCareerPath" placeholder="">
                    @foreach ($careerPaths as $careerPath)
                        <option
                            {{$careerPathId == $careerPath->id ? 'selected' : ''}} value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                    @endforeach
                </x-form.input.filter-select>
            </div>


        </x-slot>

        <x-slot name="thead">
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Job Title</x-tables.th>
            <x-tables.th>Career Path</x-tables.th>
            <x-tables.th>Substantive Rank</x-tables.th>
            <x-tables.th>Establishment</x-tables.th>
            <x-tables.th>Job Description</x-tables.th>
            <x-tables.th>Inserted</x-tables.th>
            <x-tables.th>Updated</x-tables.th>
            <x-tables.th class="text-center">Action</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td>{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->title->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->careerPath->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->rank->regiment_slug ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->establishment ?? ''}}</x-tables.td>
                    <x-tables.td
                        style="word-wrap: break-word; white-space: normal !important;">{{$row->description ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-tables.td>
                    <x-tables.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-tables.td>
                    <x-crud.livewire-action-btns id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>





