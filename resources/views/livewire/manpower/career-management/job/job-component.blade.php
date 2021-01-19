<div>
    <x-tables.data-table title="{{$title}}">
        <x-slot name="filter">
            <div class="row">
                <div class="col-3"  wire:ignore>
                    <select wire:model="filterTitle" class="form-control custom-select mb-2 mr-sm-2">
                        <option value="">Filter by Title</option>
                        @foreach ($jobTitles as $jobTitle)
                            <option {{$jobTitleId == $jobTitle->id ? 'selected' : ''}} value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--Job class--}}
                <div class="col-3"  wire:ignore>
                    <select wire:model="filterClass" class="form-control custom-select mb-2 mr-sm-2">
                        <option value="">Filter by Class</option>
                        @foreach ($classes as $class)
                            <option {{$classId == $class->id ? 'selected' : ''}} value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--Substantive Rank--}}
                <div class="col-3"  wire:ignore>
                    <select wire:model="filterRank" class="form-control custom-select mb-2 mr-sm-2 ">
                        <option value="">Filter by Rank</option>
                        @foreach ($ranks as $rank)
                            <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
                        @endforeach
                    </select>
                </div>
                {{--Career Path--}}
                <div class="col-3"  wire:ignore>
                    <select wire:model="filterCareerPath" class="form-control custom-select mb-2 mr-sm-2">
                        <option value="">Filter by Path</option>
                        @foreach ($careerPaths as $careerPath)
                            <option {{$careerPathId == $careerPath->id ? 'selected' : ''}} value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>

        <x-slot name="tableHeaders">
            <th>Job Title</th>
            <th>Career Path</th>
            <th>Substantive Rank</th>
            <th>Establishment</th>
            <th>Job Description</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td><span>{{$row->title->name ?? ''}}</span></td>
                    <td><span>{{$row->careerPath->name ?? ''}}</span></td>
                    <td><span>{{$row->rank->regiment_slug ?? ''}}</span></td>
                    <td><span>{{$row->establishment ?? ''}}</span></td>
                    <td style="word-wrap: break-word; white-space: normal !important;">
                        {{$row->description ?? ''}}
                    </td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>

                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('job_destroy','job')
    </script>
@endpush





