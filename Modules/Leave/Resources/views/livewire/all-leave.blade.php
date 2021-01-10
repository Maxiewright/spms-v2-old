<div>
    <x-leave::data-table title="All Leave" pagination="">
        <x-slot name="filter">

        </x-slot>
        <x-slot name="tableHeader">
            <th>Serviceperson</th>
            <th>Annual</th>
            <th>Sick</th>
            <th>Maternity</th>
            <th>Compassionate</th>
            <th>Special</th>
        </x-slot>
        <x-slot name="tableBody">
            @foreach($servicepeople as $serviceperson)
                @if ($serviceperson->leave->count() > 0)
                    <tr>
                        <td><a href="{{route('leave.entitlement', $serviceperson->number)}}">{{$serviceperson->name}}</a></td>
                        <td>
                            <span><h6>Taken: {{$serviceperson->leaveCount(1)}}</h6></span>
                            <h6>Accrued: {{$serviceperson->entitlementCount(1)}}</h6>
                        </td>
                        <td>
                            <span><h6>Taken: {{$serviceperson->leaveCount(2)}}</h6></span>
                            <h6>Accrued: {{$serviceperson->entitlementCount(2)}}</h6>
                        </td>
                        <td>
                            <span><h6>Taken: {{$serviceperson->leaveCount(3)}}</h6></span>
                            <h6>Accrued: {{$serviceperson->entitlementCount(3)}}</h6>
                        </td>
                        <td>
                            <span><h6>Taken: {{$serviceperson->leaveCount(4)}}</h6></span>
                            <h6>Accrued: {{$serviceperson->entitlementCount(4)}}</h6>
                        </td>
                        <td>
                            <span><h6>Taken: {{$serviceperson->leaveCount(5)}}</h6></span>
                            <h6>Accrued: {{$serviceperson->entitlementCount(5)}}</h6>
                        </td>
                    </tr>
                @endif
            @endforeach
        </x-slot>
    </x-leave::data-table>
</div>
