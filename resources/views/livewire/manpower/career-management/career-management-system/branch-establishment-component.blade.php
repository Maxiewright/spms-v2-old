<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_branch_establishment_modal')
        @endif

            <x-slot name="filters">
            <div class="row">
                <div class="col" wire:ignore>
                    <select wire:model="filterBranch" class="form-control custom-select">
                        <option value="">Filter By Branch</option>
                        @foreach ($branches as $branch)
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
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

        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Branch</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Rank</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Establishment</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Inserted</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Updated</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap text-center">Actions</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="border-b whitespace-no-wrap w40">
                        {{$loop->iteration}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->branch->name ?? ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->rank->regiment_slug ?? ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->establishment ?? ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}
                    </td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

