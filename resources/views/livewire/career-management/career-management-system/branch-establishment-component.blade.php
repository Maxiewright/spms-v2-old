<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                @include('livewire.career-management.career-management-system.partials.branch_establishment_form')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.career-management.career-management-system.partials.branch_establishment_form')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
        <x-slot name="filter">
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

        <x-slot name="tableHeaders">
            <th>Branch</th>
            <th>Rank</th>
            <th>Establishment</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->branch->name ?? ''}}</td>
                    <td>{{$row->rank->regiment_slug ?? ''}}</td>
                    <td>{{$row->establishment ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <td>
                        <button wire:click="edit({{$row->branch_id}}, {{$row->rank_id}})" class="btn btn-icon btn-sm"><i class="fa fa-edit text-danger"></i></button>
                        <button wire:click="$emit('{{str_replace(' ', '_', strtolower($title)).'_destroy'}}', {{$row->branch_id}}, {{$row->rank_id}})" class="btn btn-icon btn-sm js-sweetalert"><i class="fa fa-trash text-danger"></i></button>
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
        livewireDeleteConfirmation('branch_establishment_destroy','branch_establishment')
    </script>
@endpush
