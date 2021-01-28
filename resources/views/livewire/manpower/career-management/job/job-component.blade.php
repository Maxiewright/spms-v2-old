<div>
<x-data.metadata :title="$title" :advanceSearchToggle="($showFilters) ? 'Hide Advance Search' : 'Advance Search'">
    <x-slot name="filters">
        @if($showFilters)
            <x-form.advance-search>
                <x-slot name="filters">
                    <div class="col-span-6">
                        <x-form.input.filter-select model="filters.title" placeholder="Filter by Title">
                            @foreach ($jobTitles as $jobTitle)
                                <option value="{{$jobTitle->id}}">{{$jobTitle->name}}</option>
                            @endforeach
                        </x-form.input.filter-select>
                    </div>
                    {{--Job class--}}
                    <div class="col-span-6">
                        <x-form.input.filter-select model="filters.class" placeholder="Filter by Class">
                            @foreach ($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </x-form.input.filter-select>
                    </div>
                    {{--Substantive Rank--}}
                    <div class="col-span-6">
                        <x-form.input.filter-select model="filters.rank" placeholder="Filter by Rank">
                            @foreach ($ranks as $rank)
                                <option value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
                            @endforeach
                        </x-form.input.filter-select>
                    </div>
                    {{--Career Path--}}
                    <div class="col-span-6">
                        <x-form.input.filter-select model="filters.careerPath" placeholder="Filter by Career Path">
                            @foreach ($careerPaths as $careerPath)
                                <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                            @endforeach
                        </x-form.input.filter-select>
                    </div>
                </x-slot>
            </x-form.advance-search>
        @endif
    </x-slot>

    <x-table>
        <x-slot name="thead">
            <tr wire:key="row-head">
                <x-table.th>
                    <x-input.checkbox wire:model="selectPage"/>
                </x-table.th>
                <x-table.th sortable wire:click="sortBy('job_title_id')" :direction="$sorts['job_title_id'] ?? null">Job
                    Title
                </x-table.th>
                <x-table.th sortable wire:click="sortBy('career_path_id')">Career Path</x-table.th>
                <x-table.th sortable wire:click="sortBy('rank_id')">Substantive Rank</x-table.th>
                <x-table.th sortable wire:click="sortBy('establishment')">Establishment</x-table.th>
                <x-table.th>Job Description</x-table.th>
                <x-table.th sortable wire:click="sortBy('created_at')">Inserted</x-table.th>
                <x-table.th sortable wire:click="sortBy('updated_at')">Updated</x-table.th>
                <x-table.th class="text-center">Action</x-table.th>
            </tr>

        </x-slot>
        <x-slot name="tbody">@if ($selectPage)
                <tr class="bg-cool-gray-200" wire:key="row-message">
                    <x-table.td colspan="9">
                        @unless ($selectAll)
                            <div>
                                <span>You have selected <strong>{{ $data->count() }}</strong> transactions, do you want to select all <strong>{{ $data->total() }}</strong>?</span>
                                <x-button.link wire:click="selectAll" class="ml-1 text-blue-600">Select All
                                </x-button.link>
                            </div>
                        @else
                            <span>You are currently selecting all <strong>{{ $data->total() }}</strong> transactions.</span>
                        @endif
                    </x-table.td>
                </tr>
            @endif
            @forelse($data as $row)
                <tr wire:key="row-{{$row->id}}">
                    <x-table.td>
                        <x-input.checkbox wire:model="selectedRow" wire:key="{{$row->id}}" value="{{$row->id }}"/>
                    </x-table.td>
                    <x-table.td>{{$row->title->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->careerPath->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->rank->regiment_slug ?? ''}}</x-table.td>
                    <x-table.td>{{$row->establishment ?? ''}}</x-table.td>
                    <x-table.td>
                        @if ($row->job_description)
                            <a href="{{$row->job_description}}">
                                {{$row->job_description_path}}
                            </a>
                        @else
                            <span>None on file</span>
                        @endif
                    </x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}"/>
                </tr>
            @empty
                <tr>
                    <x-table.td colspan="9">
                        <div class="flex justify-center items-center">
                            <ic></ic>
                            <svg class="inline-block w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">...
                            </svg>
                            <span class="py-8 text-xl text-gray-400 font-medium">No Results Found</span>
                        </div>
                    </x-table.td>
                </tr>
            @endforelse
        </x-slot>
    </x-table>

    <x-slot name="pagination">
        {{$data->onEachSide(1)->links()}}
    </x-slot>

</x-data.metadata>
@include('livewire.manpower.career-management.job.partials.updateOrCreate_job_modal')
</div>




