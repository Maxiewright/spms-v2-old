<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_stream_modal')
        @endif
        <x-slot name="filters">
            <div wire:ignore>
                <select wire:model="filter" class="form-control custom-select">
                    <option value="">Filter by Branch</option>
                    @foreach ($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
        <x-slot name="thead">
            <th>Name</th>
            <th>Short Name</th>
            <th>branch</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->slug ?? ''}}</td>
                    <td>{{$row->branch->name ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>>
</div>




