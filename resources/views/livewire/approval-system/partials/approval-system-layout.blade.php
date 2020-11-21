<tr class="">
    <td class="w40"><span>{{$loop->iteration}}</span></td>
    <td class="d-flex">
        <span class="avatar avatar-blue" data-toggle="tooltip" title=""
              data-original-title="Avatar Name">
            <img src="{{$row->serviceperson->image}}" alt="">
        </span>
        <div class="ml-3">
            <h6 class="mb-0">
                <a href="{{route('servicepeople.show', $row->serviceperson->number)}}">
                    {{$row->serviceperson->name}}
                </a>
            </h6>
            <span class="text-muted">
                {{$row->serviceperson->job}} - {{$row->serviceperson->company_slug}}
            </span>
        </div>
    </td>
    <td class="">
        @include('livewire.approval-system.partials.modification-collapse')
    </td>
    <td>
        <div class="ml-3">
            <h6 class="mb-0">
                @if(count($row->serviceperson->phoneNumbers) > 0)
                    @foreach($row->serviceperson->phoneNumbers->slice(0 ,1) as $phone)
                        <a href="tel:{{$phone->number}}"><span><li
                                    style="list-style: none">{{$phone->formatted_number ?? ''}}</li></span></a>
                    @endforeach
                @else
                    <span> No Phone number Submitted </span>
                @endif
            </h6>
            @foreach($row->serviceperson->emailAddresses->slice(0 ,1) as $email)
                <a href="mailto:{{$email->email}}"><span class="text-muted"><li
                            style="list-style: none">{{$email->email}}</li></span></a>
            @endforeach
        </div>
    </td>
</tr>
