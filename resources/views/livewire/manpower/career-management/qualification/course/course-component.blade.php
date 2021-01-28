<div>
    <x-data.metadata title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.qualification.course.partials.updateOrCreate_course_modal')
        @endif
        <x-slot name="filters">
            <x-form.input.filter-select model="filter" placeholder="Filter By Institution">
                @foreach($institutions as $institution)
                    <option
                        {{$institutionId == $institution->id ? 'selected': ''}} value="{{$institution->id}}">{{$institution->name}}</option>
                @endforeach
            </x-form.input.filter-select>
        </x-slot>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Short Name</x-table.th>
            <x-table.th>Institutions</x-table.th>
            <x-table.th>Description</x-table.th>
            <x-table.th>Inserted</x-table.th>
            <x-table.th>Updated</x-table.th>
            <x-table.th class="text-center">Action</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td>{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->slug ?? ''}}</x-table.td>
                    <x-table.td class="accordion">
                        <div class="accordion__pane dark:border-dark-5">
                            <a href="javascript:;" class="accordion__pane__toggle font-medium block">
                                {{$row->slug}} Institutions
                            </a>
                            <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">
                                @foreach($row->institution as $institution)
                                    <div class="flex items-center my-1">
                                        <div class="flex-1 pl-2">
                                            {{$loop->iteration.'. '. $institution->name}}
                                        </div>
                                        <div wire:click="$emit('course_institution_detach',{{$row->id}},{{$institution->id}})"
                                             class=" text-red-700 ml-1 cursor-pointer">
                                            <i data-feather="x" class="mx-auto"></i>
                                        </div>
                                    </div>
                                    <hr class="border-b-0 my-1"/>
                                @endforeach
                            </div>
                        </div>
                    </x-table.td>
                    <x-table.td>{{$row->description ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-data.metadata>
</div>

