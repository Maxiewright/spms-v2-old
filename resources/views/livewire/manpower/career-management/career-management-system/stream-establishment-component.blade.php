<div>
    <x-data.metadata title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_stream_establishment_modal')
        @endif
{{--        filters--}}
        <x-slot name="filters">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterStream" class="input box pr-10 w-full">
                        <option value="">Filter By Stream</option>
                        @foreach ($streams as $stream)
                            <option value="{{$stream->id}}">{{$stream->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterRank" class="input box pr-10 w-full">
                        <option value="">Select Rank</option>
                        @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->regiment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
{{--        table--}}
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>Stream</x-table.th>
            <x-table.th>Rank</x-table.th>
            <x-table.th>Establishment</x-table.th>
            <x-table.th>Inserted</x-table.th>
            <x-table.th>Updated</x-table.th>
            <x-table.th class="text-center">Actions</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td>{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->stream->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->rank->regiment_slug ?? ''}}</x-table.td>
                    <x-table.td>{{$row->establishment ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>
</div>

