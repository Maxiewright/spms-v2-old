<div>
    <div>
        <x-leave::data-table title="Excessive Leave" pagination="">
            <x-slot name="filter">

            </x-slot>

            <div class="row text-center">
                <div class="col-sm-4 border-right pb-4 pt-4">
                    <label class="mb-0">Above 300</label>
                    <h4 class="font-30 font-weight-bold text-col-blue counter">12</h4>
                </div>
                <div class="col-sm-4 border-right pb-4 pt-4">
                    <label class="mb-0">Above 200</label>
                    <h4 class="font-30 font-weight-bold text-col-blue counter">25</h4>
                </div>
                <div class="col-sm-4 pb-4 pt-4">
                    <label class="mb-0">Above 100</label>
                    <h4 class="font-30 font-weight-bold text-col-blue counter">100</h4>
                </div>
            </div>

            <x-slot name="tableHeader">
                <th>#</th>
                <th>Serviceperson</th>
                <th>Balance</th>
                <th>Last Leave</th>
                <th>Action</th>
            </x-slot>
            <x-slot name="tableBody">
                {{--            @foreach ($users as $user)--}}
                <tr>
                    <td></td>
                    <td>Sgt Snooks</td>
                    <td>500</td>
                    <td>Some time ago</td>
                    <td></td>
                </tr>
                {{--            @endforeach--}}
            </x-slot>
        </x-leave::data-table>
    </div>
</div>
