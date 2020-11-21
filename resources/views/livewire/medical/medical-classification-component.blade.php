<div>
    @if ($updateMode)
        <x-metadata.update title="{{$title}}">
            <x-slot name="updateFields">
                <input type="hidden" wire:model="selectedId">
                @include('livewire.medical.partials.medical_classification_form')
            </x-slot>
        </x-metadata.update>
    @else
        <x-metadata.create title="{{$title}}">
            <x-slot name="createFields">
                @include('livewire.medical.partials.medical_classification_form')
            </x-slot>
        </x-metadata.create>
    @endif
    <x-metadata.metadata-component title="{{$title}}">
{{--        <x-slot name="filter">--}}
{{--                <div class="col-3">--}}
{{--                    <select wire:model="filterRank" class="form-control custom-select mb-2 mr-sm-2 ">--}}
{{--                        <option value="">Filter by Rank</option>--}}
{{--                        @foreach ($ranks as $rank)--}}
{{--                            <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--        </x-slot>--}}
        <x-slot name="tableHeaders">
            <th>Serviceperson</th>
            <th>P</th>
            <th>U</th>
            <th>L</th>
            <th>H</th>
            <th>H</th>
            <th>E</th>
            <th>E</th>
            <th>M</th>
            <th>S</th>
            <th>Date</th>
            <th>Location</th>
            <th>DFMO</th>
            <th>Remarks</th>
            <th>Posted</th>

        </x-slot>
        <x-slot name="tableData">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td><span>{{$row->serviceperson->name ?? ''}}</span></td>
                    <td><span>{{$row->physical_capacity ?? ''}}</span></td>
                    <td><span>{{$row->upper_limbs ?? ''}}</span></td>
                    <td><span>{{$row->locomotion ?? ''}}</span></td>
                    <td><span>{{$row->hearing_left ?? ''}}</span></td>
                    <td><span>{{$row->hearing_right ?? ''}}</span></td>
                    <td><span>{{$row->eyesight_left ?? ''}}</span></td>
                    <td><span>{{$row->eyesight_right ?? ''}}</span></td>
                    <td><span>{{$row->mental_capacity ?? ''}}</span></td>
                    <td><span>{{$row->stability ?? ''}}</span></td>
                    <td><span>{{$row->date_performed ?? ''}}</span></td>
                    <td><span>{{$row->performed_at ?? ''}}</span></td>
                    <td><span>{{$row->medicalOfficer->name ?? ''}}</span></td>
                    <td style="word-wrap: break-word; white-space: normal !important;">
                        {{$row->medical_officer_remarks  ?? ''}}
                    </td>
                    <td>{{$row->created_at != null ? $row->created_at->format('d M Y') : ''}}</td>
                    <x-metadata.action-buttons id="{{$row->id}}" destroyField="{{$title}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-metadata.metadata-component>
</div>
@push('livewire-scripts')
    <script>
        livewireDeleteConfirmation('job_destroy','job')
    </script>
@endpush






