<div>
    <x-tables.data-table title="{{$title}}">
        @if($isOpen)
            @include('livewire.manpower.career-management.career-management-system.partials.updateOrCreate_branch_modal')
        @endif
        <x-slot name="filters"></x-slot>
        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Short Name</th>
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
                        {{$row->name ?? ''}}
                    </td>
                    <td class="border-b whitespace-no-wrap">
                        {{$row->slug ?? ''}}
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
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-tables.data-table>
</div>
