<div>
    <x-data.metadata title="{{$title}}">
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
            <x-table.th>#</x-table.th>
            <x-table.th>Name</x-table.th>
            <x-table.th>Type</x-table.th>
            <x-table.th>District</x-table.th>
            <x-table.th>Description</x-table.th>
            <x-table.th>Inserted</x-table.th>
            <x-table.th>Updated</x-table.th>
            <x-table.th class="text-center">Action</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td>{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->type->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->district->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->description ?? ''}}</x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-data.metadata>
</div>

