<div>

    <x-tables.data-table title="{{$title}}">

        @if($isOpen)
            @include('events::livewire.partials.create_and_update_form')
        @endif

        <x-slot name="filters">
            <select wire:model="filterByVenue" data-placeholder="Venue" class="input w-56 box pr-10" >
                <option value="">Filter By Venue</option>
                @foreach ($venues as $venue)
                    <option
                        {{$event_venue_id == $venue->id ? 'selected' : ''}} value="{{$venue->id}}">{{$venue->name}}
                    </option>
                @endforeach
            </select>
            <select wire:model="filterByType" data-placeholder="Type" class="input w-56 box pr-10">
                <option value="">Filter By Type</option>
                @foreach ($types as $type)
                    <option {{$event_type_id == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            <select wire:model="filterByStatus" data-placeholder="Status" class="input w-56 box pr-10">
                <option value="">Filter By Status</option>
                @foreach ($statuses as $status)
                    <option
                        {{$event_status_id == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->regiment_slug}}</option>
                @endforeach
            </select>
        </x-slot>

        <x-slot name="thead">
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Ark Work</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Event</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Type</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Venue</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Organiser(s)</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Time</th>
            <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Status</th>
        </x-slot>

        <x-slot name="tbody">
            @foreach($data as $row)
                <tr>
                    <td class="w40">{{$loop->iteration}}</td>
                    <td><span><img src="{{$row->image}}" alt=""></span></td>
                    <td style="word-wrap: break-word; white-space: normal !important;">
                        <h6 class="mb-0">{{$row->name ?? ''}}</h6>
                        <span>{{$row->description ?? ''}}</span>
                        {{$row->description ?? ''}}
                    </td>
                    <td><span>{{$row->type->name}}</span></td>
                    <td><span>{{$row->venue->name ?? ''}}</span></td>
                    <td>
                        <ul class="list-unstyled team-info mb-0 w150">
                            @if ($row->servicepersonOrganisers)
                                @foreach ($row->servicepersonOrganisers as $organiser)
                                    <li><img src="{{$organiser->image}}"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             title="{{$organiser->name}}"
                                             alt="{{$organiser->name}}">
                                    </li>
                                @endforeach
                            @elseif($row->unitOrganisers)
                                @foreach ($row->servicepersonOrganisers as $organiser)
                                    <li><img src="{{$organiser->image}}"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             title="{{$organiser->name}}"
                                             alt="{{$organiser->name}}">
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>
                        <div class="text-secondary">Start: {{$row->start_at->toDayDateTimeString()}}</div>
                        <div class="text-red">End: {{$row->start_at->toDayDateTimeString()}}</div>
                    </td>
                    <td><span>{{$row->status->name}}</span></td>

                    <x-crud.livewire-action-btns id="{{$row->id}}"/>
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="pagination">
            {{$data->links()}}
        </x-slot>
    </x-tables.data-table>

</div>


