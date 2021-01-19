<div>
    <x-tables.data-table title="{{$title}}">
        {{--            filter by type--}}
        <x-slot name="filter">
            <select wire:model="filter" class="form-control custom-select">
                <option slected value="">Find by Type</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </x-slot>
        <x-slot name="tableHeaders">
            <th>Name</th>
            <th>Type</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->type->name}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>

                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>



