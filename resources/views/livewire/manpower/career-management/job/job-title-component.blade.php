<div>
    <x-data.metadata title="{{$title}}">
        <x-slot name="filters"></x-slot>
            <x-table>
                <x-slot name="thead">
                    <x-table.th>#</x-table.th>
                    <x-table.th>Name</x-table.th>
                    <x-table.th>Short Name</x-table.th>
                    <x-table.th>Category</x-table.th>
                    @include('livewire.partials.data_table.timestamps-th')
                    <x-table.th class="text-center">Actions</x-table.th>
                </x-slot>
                <x-slot name="tbody">
                    @foreach($data as $row)
                        <tr>
                            <x-table.td>{{$loop->iteration}}</x-table.td>
                            <x-table.td> {{$row->name}}</x-table.td>
                            <x-table.td>{{$row->slug}}</x-table.td>
                            <x-table.td>{{$row->category->name}}</x-table.td>
                            @include('livewire.partials.data_table.timestamps-td')
                            <x-table.action-buttons id="{{$row->id}}" />
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>
    @include('livewire.manpower.career-management.job.partials.updateOrCreate_job_title_modal')
</div>

