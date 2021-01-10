<div class="mt-3">
    <x-leave::layout.section>
        <x-leave::data-table title="" pagination="">
            <x-slot name="filter"></x-slot>
            <x-slot name="tableHeader">
                <th>Year</th>
                <th>Type</th>
                <th>Entitled</th>
                <th>B/F</th>
                <th>Due</th>
                <th>Taken</th>
                <th>Remarks</th>
            </x-slot>
            <x-slot name="tableBody">
                @foreach($entitlements as $entitlement)
                    <tr>
                        <td>{{$entitlement->year}}</td>
                        <td>{{$entitlement->leaveGroupEntitlement->type->name}}</td>
                        <td>{{$entitlement->leaveGroupEntitlement->days_entitled}}</td>
                        <td></td>
                        <td>{{$entitlement->daysDue()}}</td>
                        <td>

                            {{$entitlement->leaveTaken}}
                        </td>
{{--                        <td>{{$entitlement->remarks ?? ''}} </td>--}}
                    </tr>
                @endforeach
            </x-slot>
        </x-leave::data-table>
    </x-leave::layout.section>
</div>
