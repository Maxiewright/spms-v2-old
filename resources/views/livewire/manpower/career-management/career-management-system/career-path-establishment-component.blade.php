<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_career_path_establishment_modal')
        @endif
{{--        filters--}}
        <x-slot name="filters">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterCareerPath" class="input box pr-10 w-full">
                        <option value="">Filter By Branch</option>
                        @foreach ($careerPaths as $careerPath)
                            <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col" wire:ignore>
                    <select wire:model="filterRank" class="input box pr-10 w-full">
                        <option value="">Filter By Rank</option>
                        @foreach ($ranks as $rank)
                            <option value="{{$rank->id}}">{{$rank->regiment}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
{{--        table--}}
        <x-slot name="thead">
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Career Path</x-tables.th>
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
                    <x-tables.td>{{$row->careerPath->name ?? ''}}</x-tables.td>
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


