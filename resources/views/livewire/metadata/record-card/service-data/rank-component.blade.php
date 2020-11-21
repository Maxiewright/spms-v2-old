<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                @include('livewire.metadata.record-card.service-data.partials.rank_create_and_update_form_fields')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.metadata.record-card.service-data.partials.rank_create_and_update_form_fields')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
        <x-slot name="tableHeaders">
            <th>Rank Grade</th>
            <th colspan="2" >Regiment</th>
            <th colspan="2">Coast Guard</th>
            <th colspan="2">Air Guard</th>
            <th colspan="2"></th>
        </x-slot>
        <x-slot name="tableData">
            <tr>
                <td>#</td>
                <td><span class="strong">Grade</span> </td>
                <td><span class="strong">Rank</span> </td>
                <td><span class="strong">Abbreviation</span></td>
                <td><span class="strong">Rank</span></td>
                <td><span class="strong">Abbreviation</span></td>
                <td><span class="strong">Rank</span></td>
                <td><span class="strong">Abbreviation</span></td>
                <td><span class="strong">Inserted</span></td>
                <td><span class="strong">Updated</span></td>
            </tr>
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td>{{$row->grade}}</td>
                    <td>{{$row->regiment}}</td>
                    <td>{{$row->regiment_slug}}</td>
                    <td>{{$row->coast_guard}}</td>
                    <td>{{$row->coast_guard_slug}}</td>
                    <td>{{$row->air_guard}}</td>
                    <td>{{$row->air_guard_slug}}</td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <td>{{$row->updated_at != null ? $row->updated_at->format('d M Y') : ''}}</td>
                    <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-metadata.metadata-component>
</div>

