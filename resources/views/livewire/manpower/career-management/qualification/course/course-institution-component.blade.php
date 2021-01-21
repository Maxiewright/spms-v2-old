<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.qualification.course.partials.updateOrCreate_course_institution_modal')
        @endif
        <x-slot name="filters">
            <div>
                <x-form.input.filter-select model="filter" placeholder="Find by Type">
                    @foreach($courseTypes as $courseType)
                        <option value="{{$courseType->id}}">{{$courseType->name}}</option>
                    @endforeach
                </x-form.input.filter-select>
            </div>

        </x-slot>
        <x-slot name="thead">
            <x-tables.th></x-tables.th>
            <x-tables.th>Name</x-tables.th>
            <x-tables.th>Short Name</x-tables.th>
            <x-tables.th>Type</x-tables.th>
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
                    <x-tables.td>{{$row->type->name ?? ''}}</x-tables.td>
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

@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('course_institution_destroy','course_institution')
    </script>
@endpush
