<x-leave::data-table title="Leave Entitlement">
    <x-slot name="filter">
        <x-leave::dynamic-select option="status" action="Filter by ">
            @foreach($statuses as $key => $status)
                <option value="{{$key}}">{{$status}}</option>
            @endforeach
        </x-leave::dynamic-select>
        <x-leave::dynamic-select option="type" action="Filter by ">
            @foreach($types as $key => $type)
                <option value="{{$key}}">{{$type}}</option>
            @endforeach
        </x-leave::dynamic-select>
    </x-slot>
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
        @forelse($entitlements as $entitlement)

        @empty
            <tr>
                <td colspan="7"> No Entitlement Records Found</td>
            </tr>
        @endforelse
        <tr>
            <td><span> 2020 </span></td>
            <td><span> Annual Leave </span></td>
            <td><h6 class="mb-0">42 Days</h6></td>
            <td><h6 class="mb-0">200 Days</h6></td>
            <td><h6 class="mb-0">242 Days</h6></td>
            <td>
                <div>
                    <a href="{{route('leave.show', 1)}}"><h6 class="mb-0">30 Days</h6>
                        <small class="text-muted">Click here for year view</small>
                    </a>
                </div>
            </td>
            <td><i class="fe fe-edit"></i></td>
        </tr>
    </x-slot>
    <x-slot name="pagination">
        TODO::insert pagination links here
    </x-slot>
</x-leave::data-table>
