<div>
    <x-tables.data-table title="{{$title}}">
        @if ($isOpen)
            @include('medical::livewire.partials.updateOrCreate_medical_classification')
        @endif
        <x-slot name="filters">
{{--                <select wire:model="filterRank" class="">--}}
{{--                    <option value="">Filter by Rank</option>--}}
{{--                    @foreach ($ranks as $rank)--}}
{{--                        <option--}}
{{--                            {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
        </x-slot>
        <x-slot name="thead">
            <x-tables.th>#</x-tables.th>
            <x-tables.th>Serviceperson</x-tables.th>
            <x-tables.th>P</x-tables.th>
            <x-tables.th>U</x-tables.th>
            <x-tables.th>L</x-tables.th>
            <x-tables.th>H</x-tables.th>
            <x-tables.th>H</x-tables.th>
            <x-tables.th>E</x-tables.th>
            <x-tables.th>E</x-tables.th>
            <x-tables.th>M</x-tables.th>
            <x-tables.th>S</x-tables.th>
            <x-tables.th>Date</x-tables.th>
            <x-tables.th>Location</x-tables.th>
            <x-tables.th>DFMO</x-tables.th>
            <x-tables.th>Remarks</x-tables.th>
            <x-tables.th>Posted</x-tables.th>
            <x-tables.th class="text-center">Action</x-tables.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-tables.td>{{$loop->iteration}}</x-tables.td>
                    <x-tables.td>{{$row->serviceperson->name ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->physical_capacity ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->upper_limbs ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->locomotion ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->hearing_left ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->hearing_right ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->eyesight_left ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->eyesight_right ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->mental_capacity ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->stability ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->date_performed ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->performed_at ?? ''}}</x-tables.td>
                    <x-tables.td>{{$row->medicalOfficer->name ?? ''}}</x-tables.td>
                    <x-tables.td style="word-wrap: break-word; white-space: normal !important;">
                        {{$row->medical_officer_remarks  ?? ''}}
                    </x-tables.td>
                    <x-tables.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-tables.td>
                    <x-crud.livewire-action-btns id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>
</div>






