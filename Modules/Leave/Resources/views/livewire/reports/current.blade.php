<div>
    <x-leave::data-table title="Pending Request" pagination="">
        <x-slot name="filter">

        </x-slot>
        <div class="row text-center">
            <div class="col-sm-3 border-right pb-4 pt-4">
                <label class="mb-0">Annual</label>
                <h4 class="font-30 font-weight-bold text-col-blue counter">12</h4>
            </div>
            <div class="col-sm-3 border-right pb-4 pt-4">
                <label class="mb-0">Sick</label>
                <h4 class="font-30 font-weight-bold text-col-blue counter">25</h4>
            </div>
            <div class="col-sm-3 border-right pb-4 pt-4">
                <label class="mb-0">Resettlement</label>
                <h4 class="font-30 font-weight-bold text-col-blue counter">100</h4>
            </div>
            <div class="col-sm-3 pb-4 pt-4">
                <label class="mb-0">Maternity</label>
                <h4 class="font-30 font-weight-bold text-col-blue counter">100</h4>
            </div>
        </div>
        <x-slot name="tableHeader">
            <th>#</th>
            <th>Serviceperson</th>
            <th>Type</th>
            <th>Remaining Time</th>
            <th>Period</th>
            <th>Action</th>
        </x-slot>
        <x-slot name="tableBody">
            {{--            @foreach ($users as $user)--}}
            <tr>
                <td>#</td>
                <td>Sgt Dooks</td>
                <td>P/L</td>
                <td>5 days</td>
                <td>30 days, Form - To</td>
                <td>extend leave</td>
            </tr>
            {{--            @endforeach--}}
        </x-slot>
    </x-leave::data-table>
</div>
