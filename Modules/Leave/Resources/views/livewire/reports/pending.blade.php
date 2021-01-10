<div>
    <x-leave::data-table title="Pending Request" pagination="">
        <x-slot name="filter">

        </x-slot>
        <x-slot name="tableHeader">
            <th>#</th>
            <th>Application Date</th>
            <th>Serviceperson</th>
            <th>Type</th>
            <th>Days Requested</th>
            <th>Period</th>
            <th>Balance</th>
            <th>Action</th>
        </x-slot>
        <x-slot name="tableBody">
{{--            @foreach ($users as $user)--}}
                <tr>
                    <td></td>
                    <td>01 Sep 19</td>
                    <td>Sgt Snooks</td>
                    <td>P/L</td>
                    <td>30 days</td>
                    <td>20 Sep 19 - 10 Oct 19</td>
                    <td>300</td>
                    <td class="d-flex">
                        <a href="#">Approve</a>
                    </td>
                </tr>
{{--            @endforeach--}}
        </x-slot>
    </x-leave::data-table>
</div>
