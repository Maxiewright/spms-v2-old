<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_specialty_modal')
        @endif
        <x-slot name="filters">
            <div wire:ignore>
                <select wire:model="filter" class="form-control custom-select">
                    <option value="">Filter by Career Path</option>
                    @foreach ($careerPaths as $careerPath)
                        <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>
        <x-slot name="thead">
            <th>Name</th>
            <th>Short Name</th>
            <th>Career Path</th>
            <th>Inserted</th>
            <th>Updated</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->name ?? ''}}</td>
                    <td>{{$row->slug ?? ''}}</td>
                    <td>{{$row->careerPath->name ?? ''}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

