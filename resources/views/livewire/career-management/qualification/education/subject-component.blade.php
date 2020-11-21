<div>
    <div>
        @if ($updateMode)
            <x-metadata.update title="{{$title}}">
                <x-slot name="updateFields">
                    <input type="hidden" wire:model="selectId">
                    @include('livewire.career-management.qualification.education.partials.subject_create_and_update_form_fields')
                </x-slot>
            </x-metadata.update>
        @else
            <x-metadata.create title="{{$title}}">
                <x-slot name="createFields">
                    @include('livewire.career-management.qualification.education.partials.subject_create_and_update_form_fields')
                </x-slot>
            </x-metadata.create>
        @endif
        <x-metadata.metadata-component title="{{$title}}">
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
            livewireDeleteConfirmation('subject_destroy','subject')
        </script>
    @endpush
</div>