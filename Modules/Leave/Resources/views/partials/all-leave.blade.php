<x-leave::data-table title="Leave Entitlement">
    <x-slot name="filter">
        <x-leave::dynamic-select option="status" action="Filter by ">
            @foreach($statuses as $key => $status)
                <option
                        value="{{$key}}">{{$status}}
                </option>
            @endforeach
        </x-leave::dynamic-select>
        <x-leave::dynamic-select option="type" action="Filter by ">
            @foreach($types as $key => $type)
                <option value="{{$key}}">{{$type}}
                </option>
            @endforeach
        </x-leave::dynamic-select>
    </x-slot>
    <x-slot name="tableHeader">
        <th>#</th>
        <th>Period</th>
        <th>Type</th>
        <th>Passage Provided</th>
        <th>Approved By</th>
        <th>Remarks</th>
    </x-slot>
    <x-slot name="tableBody">
{{--        @forelse($entitlements as $entitlement)--}}

{{--        @empty--}}
{{--            <tr>--}}
{{--                <td colspan="7"> No Entitlement Records Found</td>--}}
{{--            </tr>--}}
{{--        @endforelse--}}
        <tr>
            <td></td>
            <td class="d-flex">
                <div>
                    <h6 class="mb-0">42 Days</h6>
                    <span>24 Sep 20 - 1 Nov 20</span>
                </div>
            </td>
            <td><span> Annual Leave </span></td>
            <td><h6 class="mb-0"> </h6></td>
            <td><h6 class="mb-0">001 Maj D Boss</h6></td>
            <td>He had to much, so i send him</td>
        </tr>
    </x-slot>
    <x-slot name="pagination">
        TODO::insert pagination links here
    </x-slot>
</x-leave::data-table>