<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_stream_establishment_modal')
        @endif
{{--        filters--}}
        <x-slot name="filters">
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
        <x-slot name="thead">
            <th>Stream</th>
            <th>Rank</th>
            <th>Establishment</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->stream->name ?? ''}}</td>
                    <td>{{$row->rank->regiment_slug ?? ''}}</td>
                    <td>{{$row->establishment ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

