<div>
    <x-tables.data-table title="{{$title}}">
        {{--            filter by type--}}
        <x-slot name="filter">
            <div wire:ignore>
                <select wire:model="filter" class="form-control custom-select">
                    <option slected value="">Find by Type</option>
                    @foreach($courseTypes as $courseType)
                        <option value="{{$courseType->id}}">{{$courseType->name}}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Short Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->slug ?? ''}}</td>
                    <td>{{$row->type->name ?? ''}}</td>
                    <td>{{$row->description ?? ''}}</td>
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
        livewireDeleteConfirmation('course_institution_destroy','course_institution')
    </script>
@endpush
