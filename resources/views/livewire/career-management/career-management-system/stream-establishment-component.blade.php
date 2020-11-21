<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                @include('livewire.career-management.career-management-system.partials.stream_establishment_form')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.career-management.career-management-system.partials.stream_establishment_form')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
{{--        filters--}}
        <x-slot name="filter">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterStream" class="form-control custom-select">
                        <option value="">Filter By Stream</option>
                        @foreach ($streams as $stream)
                            <option value="{{$stream->id}}">{{$stream->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterRank" class="form-control custom-select">
                        <option value="">Select Rank</option>
                        @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->regiment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
{{--        tables--}}
        <x-slot name="tableHeaders">
            <th>Stream</th>
            <th>Rank</th>
            <th>Establishment</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->stream->name ?? ''}}</td>
                    <td>{{$row->rank->regiment_slug ?? ''}}</td>
                    <td>{{$row->establishment ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <td>
                        <button wire:click="edit({{$row->stream_id}}, {{$row->rank_id}})" class="btn btn-icon btn-sm"><i class="fa fa-edit text-danger"></i></button>
                        <button wire:click="$emit('{{str_replace(' ', '_', strtolower($title)).'_destroy'}}', {{$row->stream_id}}, {{$row->rank_id}})" class="btn btn-icon btn-sm js-sweetalert"><i class="fa fa-trash text-danger"></i></button>
                    </td>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-metadata.metadata-component>
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('stream_establishment_destroy','stream_establishment')
    </script>
@endpush
