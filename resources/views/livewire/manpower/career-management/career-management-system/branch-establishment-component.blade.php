<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_branch_establishment_modal')
        @endif
        <x-slot name="filters">
            <select wire:model="filterBranch" data-placeholder="Filter by Rank" class="input box pr-10 w-full">
                <option value="">Filter By Branch</option>
                @foreach ($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
            </select>
            <select wire:model="filterRank" data-placeholder="Filter by Rank" class="input box pr-10 w-full">
                <option value="">Select Rank</option>
                @foreach ($ranks as $rank)
                    <option value="{{$rank->id}}">{{$rank->regiment}}</option>
                @endforeach
            </select>
        </x-slot>

        <x-slot name="thead">
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Branch</x-tables.th>
            <x-tables.th>Rank</x-tables.th>
            <x-tables.th>Establishment</x-tables.th>
            <x-tables.th>Inserted</x-tables.th>
            <x-tables.th>Updated</x-tables.th>
            <x-tables.th class="text-center">Actions</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td>{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->branch->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->rank->regiment_slug ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->establishment ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-tables.td>
                    <x-tables.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-tables.td>
                    <x-crud.livewire-action-btns id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

