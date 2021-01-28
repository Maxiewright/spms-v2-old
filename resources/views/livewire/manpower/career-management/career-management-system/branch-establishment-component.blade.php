<div>
    <x-data.metadata title="{{$title}}">
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
            <x-table.th>#</x-table.th>
            <x-table.th>Branch</x-table.th>
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
                    <x-table.td>{{$row->branch->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->rank->regiment_slug ?? ''}}</x-table.td>
                    <x-table.td>{{$row->establishment ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}" />
{{--                    <x-livewire-double-id-action-btns id="{{$row->branch->id}}" id2="{{$row->rank->id}}" />--}}
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>
</div>

