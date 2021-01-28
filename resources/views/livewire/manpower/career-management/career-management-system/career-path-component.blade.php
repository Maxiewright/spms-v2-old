<div>
    <x-data.metadata title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_career_path_modal')
        @endif
        <x-slot name="filters">
            <div wire:ignore>
                <select wire:model="filterStream" class="input box pr-10 w-full">
                    <option value="">Filter by Stream</option>
                    @foreach ($streams as $stream)
                        <option value="{{$stream->id}}">{{$stream->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Short Name</x-table.th>
            <x-table.th>Stream</x-table.th>
            <x-table.th>Inserted</x-table.th>
            <x-table.th>Updated</x-table.th>
            <x-table.th class="text-center">Actions</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td class="w40">{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->slug ?? ''}}</x-table.td>
                    <x-table.td>{{$row->stream->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-data.metadata>
</div>




