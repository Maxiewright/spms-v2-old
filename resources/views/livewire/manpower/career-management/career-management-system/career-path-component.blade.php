<div>
    <x-tables.data-table title="{{$title}}">
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
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Name</x-tables.th>
            <x-tables.th>Short Name</x-tables.th>
            <x-tables.th>Stream</x-tables.th>
            <x-tables.th>Inserted</x-tables.th>
            <x-tables.th>Updated</x-tables.th>
            <x-tables.th class="text-center">Actions</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td class="w40">{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->slug ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->stream->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-tables.td>
                    <x-tables.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-tables.td>
                    <x-crud.livewire-action-btns id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>




