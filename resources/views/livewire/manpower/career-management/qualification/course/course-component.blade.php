<div>
    <x-tables.data-table title="{{$title}}">
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
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Name</x-tables.th>
            <x-tables.th>Short Name</x-tables.th>
            <x-tables.th>Institutions</x-tables.th>
            <x-tables.th>Description</x-tables.th>
            <x-tables.th>Inserted</x-tables.th>
            <x-tables.th>Updated</x-tables.th>
            <x-tables.th class="text-center">Action</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td>{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->slug ?? ''}}</x-tables.td>
                    <x-tables.td class="accordion">
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
                    </x-tables.td>
                    <x-tables.td>{{$row->description ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-tables.td>
                    <x-tables.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-tables.td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

