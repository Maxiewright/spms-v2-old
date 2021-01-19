<div>
    <div>
        <x-tables.data-table title="{{$title}}">
            {{--            filter by type--}}
            <x-slot name="filter">
                <div class="row">
                    <div class="col" wire:ignore>
                        <select wire:model="filterLevel" class="form-control custom-select">
                            <option slected value="">Filter by Education Level</option>
                            @foreach($educationLevels as $educationLevel)
                                <option value="{{$educationLevel->id}}">{{$educationLevel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </x-slot>
            <x-slot name="tableHeaders">
                <th>Name</th>
                <th>Leave</th>
                <th>Inserted</th>
                <th>Updated</th>
            </x-slot>
            <x-slot name="tableData">
                @foreach($data as $row)
                    <tr>
                        <td class="w40">{{$loop->iteration}}</td>
                        <td>{{$row->name ?? ''}}</td>
                        <td>{{$row->level->name ?? ''}}</td>
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
            livewireDeleteConfirmation('subject_destroy','subject')
        </script>
    @endpush
</div>
