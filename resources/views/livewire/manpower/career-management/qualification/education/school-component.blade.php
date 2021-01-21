<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.qualification.education.partials.updateOrCreate_school_modal')
        @endif
        <x-slot name="filters">
            <x-form.input.filter-select model="filterType" placeholder="Find by Type">
                @foreach($schoolTypes as $schoolType)
                    <option value="{{$schoolType->id}}">{{$schoolType->name}}</option>
                @endforeach
            </x-form.input.filter-select>

            <x-form.input.filter-select model="filterDistrict" placeholder="Find by District">
                @foreach($schoolDistricts as $schoolDistrict)
                    <option value="{{$schoolDistrict->id}}">{{$schoolDistrict->name}}</option>
                @endforeach
            </x-form.input.filter-select>

            <x-form.input.filter-select model="filterLevel" placeholder="Find by Level">
                @foreach($schoolLevels as $schoolLevel)
                    <option value="{{$schoolLevel->id}}">{{$schoolLevel->name}}</option>
                @endforeach
            </x-form.input.filter-select>
        </x-slot>
        <x-slot name="thead">
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Name</x-tables.th>
            <x-tables.th>Type</x-tables.th>
            <x-tables.th>District</x-tables.th>
            <x-tables.th>Description</x-tables.th>
            <x-tables.th>Inserted</x-tables.th>
            <x-tables.th>Updated</x-tables.th>
            <x-tables.th class="text-center">Action</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td>{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->type->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->district->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->description ?? ''}}</x-tables.td>
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

