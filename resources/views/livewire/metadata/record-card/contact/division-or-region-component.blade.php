<div>
    <div>
        @if ($updateMode)
            <x-metadata.update title="{{$title}}">
                <x-slot name="updateFields">
                    <input type="hidden" wire:model="selectId">
                    @include('livewire.metadata.record-card.contact.partials.division_or_region_form_fields')
                </x-slot>
            </x-metadata.update>
        @else
            <x-metadata.create title="{{$title}}">
                <x-slot name="createFields">
                    @include('livewire.metadata.record-card.contact.partials.division_or_region_form_fields')
                </x-slot>
            </x-metadata.create>
        @endif
        <x-metadata.metadata-component title="{{$title}}">
{{--            filter by type--}}
            <x-slot name="filter">
                <div wire:ignore>
                    <select wire:model="filter" class="form-control custom-select">
                        <option slected value="">Find by Type</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot>
            <x-slot name="tableHeaders">
                <th>Name</th>
                <th>Type</th>
                <th>Code</th>
                <th>Inserted</th>
                <th>Updated</th>
            </x-slot>
            <x-slot name="tableData">
                @foreach($data as $row)
                    <tr>
                        <td class="w40">{{$loop->iteration}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->type->name}}</td>
                        <td>{{$row->code}}</td>
                        <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                        <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                        <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>
                    </tr>
                @endforeach
            </x-slot>
            <x-slot name="pagination">
                {{$data->onEachSide(1)->links()}}
            </x-slot>
        </x-metadata.metadata-component>
    </div>

    @push('livewire-scripts')
        <script>
            livewireDeleteConfirmation('division_or_region_destroy','division_or_region')
        </script>
    @endpush
</div>


