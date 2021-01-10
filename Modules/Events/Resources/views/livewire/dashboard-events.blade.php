<div>
    @if ($events)

        <div class="section-body mt-10">
            <hr>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 text-center">
                        <div class="mb-4">
                            <h4>Upcoming Events</h4>
                        </div>
                    </div>
                </div>
                <div class="tab-content taskboard">
                    <div class="tab-pane fade show active" id="TaskBoard-list" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table table-hover table-vcenter mb-0 table_custom spacing8 text-nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Venue</th>
                                    <th>Organiser</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <h6 class="mb-0">{{$event->name ?? ''}}</h6>
                                            <span>{{$event->description ?? ''}}</span>
                                        </td>
                                        <td>
                                            <span class="tag tag-indigo">{{$event->type->name}}</span>
                                        </td>
                                        <td>
                                            {{$event->venue->name ?? ''}}
                                        </td>
                                        <td>
                                            <ul class="list-unstyled team-info mb-0 w150">
                                                @if ($event->servicepersonOrganisers)
                                                    @foreach ($event->servicepersonOrganisers as $organiser)
                                                        <li><img src="{{$organiser->image}}"
                                                                 data-toggle="tooltip"
                                                                 data-placement="top"
                                                                 title="{{$organiser->name}}"
                                                                 alt="{{$organiser->name}}">
                                                        </li>
                                                    @endforeach
                                                @elseif($event->unitOrganisers)
                                                    @foreach ($event->servicepersonOrganisers as $organiser)
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
                                            <div class="text-secondary">Start: {{$event->start_at->toDayDateTimeString()}}</div>
                                            <div class="text-red">End: {{$event->start_at->toDayDateTimeString()}}</div>
                                        </td>
                                        <td>
                                            <span class="tag tag-blue">{{$event->status->name}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
