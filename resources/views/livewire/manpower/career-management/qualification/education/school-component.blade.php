<div>
    <x-tables.data-table title="{{$title}}">
        {{--            filter by type--}}
        <x-slot name="filter">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterType" class="form-control custom-select">
                        <option slected value="">Find by Type</option>
                        @foreach($schoolTypes as $schoolType)
                            <option value="{{$schoolType->id}}">{{$schoolType->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterDistrict" class="form-control custom-select">
                        <option slected value="">Find by District</option>
                        @foreach($schoolDistricts as $schoolDistrict)
                            <option value="{{$schoolDistrict->id}}">{{$schoolDistrict->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterLevel" class="form-control custom-select">
                        <option slected value="">Find by Level</option>
                        @foreach($schoolLevels as $schoolLevel)
                            <option value="{{$schoolLevel->id}}">{{$schoolLevel->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Type</th>
            <th>District</th>
            <th>Description</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->type->name ?? ''}}</td>
                    <td>{{$row->district->name ?? ''}}</td>
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
        livewireDeleteConfirmation('school_destroy','school')
    </script>
@endpush

