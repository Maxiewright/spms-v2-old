<div>
    <x-data.metadata title="{{$title}}">
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
            <x-table.th>#</x-table.th>
            <x-table.th>Serviceperson</x-table.th>
            <x-table.th>P</x-table.th>
            <x-table.th>U</x-table.th>
            <x-table.th>L</x-table.th>
            <x-table.th>H</x-table.th>
            <x-table.th>H</x-table.th>
            <x-table.th>E</x-table.th>
            <x-table.th>E</x-table.th>
            <x-table.th>M</x-table.th>
            <x-table.th>S</x-table.th>
            <x-table.th>Date</x-table.th>
            <x-table.th>Location</x-table.th>
            <x-table.th>DFMO</x-table.th>
            <x-table.th>Remarks</x-table.th>
            <x-table.th>Posted</x-table.th>
            <x-table.th class="text-center">Action</x-table.th>
        </x-slot>
        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <x-table.td>{{$loop->iteration}}</x-table.td>
                    <x-table.td>{{$row->serviceperson->name ?? ''}}</x-table.td>
                    <x-table.td>{{$row->physical_capacity ?? ''}}</x-table.td>
                    <x-table.td>{{$row->upper_limbs ?? ''}}</x-table.td>
                    <x-table.td>{{$row->locomotion ?? ''}}</x-table.td>
                    <x-table.td>{{$row->hearing_left ?? ''}}</x-table.td>
                    <x-table.td>{{$row->hearing_right ?? ''}}</x-table.td>
                    <x-table.td>{{$row->eyesight_left ?? ''}}</x-table.td>
                    <x-table.td>{{$row->eyesight_right ?? ''}}</x-table.td>
                    <x-table.td>{{$row->mental_capacity ?? ''}}</x-table.td>
                    <x-table.td>{{$row->stability ?? ''}}</x-table.td>
                    <x-table.td>{{$row->date_performed ?? ''}}</x-table.td>
                    <x-table.td>{{$row->performed_at ?? ''}}</x-table.td>
                    <x-table.td>{{$row->medicalOfficer->name ?? ''}}</x-table.td>
                    <x-table.td style="word-wrap: break-word; white-space: normal !important;">
                        {{$row->medical_officer_remarks  ?? ''}}
                    </x-table.td>
                    <x-table.td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</x-table.td>
                    <x-table.action-buttons id="{{$row->id}}" />
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-data.metadata>
</div>






