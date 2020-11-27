<div>
    <x-tables.data-table title="{{$title}}">
        @if ($isOpen)
            @include('livewire.system-admin.metadata.service-data.partials.rank_updateOrCreate_modal')
        @endif
        <x-slot name="filters"></x-slot>
        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Rank Grade</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="2" >Regiment</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="2">Coast Guard</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="2">Air Guard</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="4"></th>
        </x-slot>
        <x-slot name="tbody">
            <tr>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Grade</span> </td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Rank</span> </td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Abbreviation</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Rank</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Abbreviation</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Rank</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Abbreviation</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Inserted</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap"><span class="strong">Updated</span></td>
                <td class="border-b-2 dark:border-dark-5 whitespace-no-wrap text-center"><span class="strong">Actions</span></td>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td class="border-b whitespace-no-wrap" class="w40">{{$loop->iteration}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->grade}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->regiment}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->regiment_slug}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->coast_guard}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->coast_guard_slug}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->air_guard}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->air_guard_slug}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td class="border-b whitespace-no-wrap">{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>

