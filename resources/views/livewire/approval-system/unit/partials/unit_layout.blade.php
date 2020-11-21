<x-approval-system.approval-system-card title="{{$title}}">
    <x-slot name="tableHeaders">
        <th scope="col">Serviceperson</th>
        <th scope="col">Bn</th>
        <th scope="col">Coy</th>
        <th scope="col">Plt</th>
        <th scope="col">Sect</th>
        <th scope="col">Posted By</th>
        <th scope="col">Submitted On</th>
    </x-slot>
    <x-slot name="tableData">
        @if($units)
            @foreach($units as $unit)
                <tr>
                    <td class="w40">{{$loop->iteration ?? ''}}</td>
                    <td>{{$unit->serviceperson->name ?? 'Serviceperson Not yet Approved!'}}</td>
                    <td>{{$unit->company->battalion->slug ?? ''}}</td>
                    <td>{{$unit->company->slug ?? ''}}</td>
                    <td>{{$unit->platoon->slug ?? ''}}</td>
                    <td>{{$unit->section->slug ?? ''}}</td>
                    <td>{{$unit->creator->name ?? ''}}</td>
                    <td>{{$unit->created_at->format('d M Y') ?? ''}}</td>
                    <td>
                        <button title="Approve" class="btn btn-icon btn-sm" >
                            <a href="#">
                                <i class="fa fa-check"></i>
                            </a>
                        </button>
                        <button title="Reject" class="btn btn-icon btn-sm" >
                            <a href="#">
                                <i class="fa fa-check"></i>
                            </a>
                        </button>
                        <button type="button" class="btn btn-icon btn-sm" title="Edit">
                            <a href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </button>

                        <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Set as Inactive" data-type="confirm"><i class="fa fa-unlink text-danger"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </x-slot>
    <x-slot name="pagination">
        {{$units->onEachSide(1)->links()}}
    </x-slot>
</x-approval-system.approval-system-card>

@push('livewire-scripts')
    <script>
        livewireApprovalConfirmation('approveServiceperson')
        livewireApprovalConfirmation('rejectServiceperson')
    </script>
@endpush


