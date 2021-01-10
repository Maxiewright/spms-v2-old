<div>
    <x-leave::data-table title="All Leave" pagination="">
        <x-slot name="filter">

        </x-slot>
        <x-slot name="tableHeader">
            <th>Serviceperson</th>
            <th>Period</th>
            <th>Amt Refunded</th>
            <th>Reason</th>
            <th>adjusted by</th>
            <th>Supporting Docs</th>
            <th>Remarks</th>
        </x-slot>
        <x-slot name="tableBody">
            {{--                   @foreach($leaves as $leave)--}}
            <tr>
                <td></td>
                <td><span><a href="">leave period with link</a></span></td>
                <td>12 Days</td>
                <td>Called off</td>
                <td>Col Sam Baddy</td>
                <td><span><a href="">leave period with link</a></span></td>
                <td>
                    {{--                            @if ($remarks > 1)--}}
                    <span><a href="">link to all remarks</a></span>
                    {{--                            @else--}}
                    {{--                                @foreach($remarks as $remark)--}}
                    <span>Remark</span>
                    {{--                                @endforeach--}}
                    {{--                            @endif--}}
                </td>
            </tr>
            {{--                   @endforeach--}}
        </x-slot>
    </x-leave::data-table>
</div>
