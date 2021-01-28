<div>
    <x-data.metadata title="{{$title}}">
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
            <x-table.th></x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Short Name</x-table.th>
            <x-table.th>Type</x-table.th>
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
                    <x-table.td>{{$row->type->name ?? ''}}</x-table.td>
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

@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('course_institution_destroy','course_institution')
    </script>
@endpush
