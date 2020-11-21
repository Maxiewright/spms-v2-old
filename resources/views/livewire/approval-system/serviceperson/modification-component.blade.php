<div>
    <x-approval-system.approval-system-card title="{{$title}}">
        <x-slot name="tableHeaders">
            <th>Serviceperson</th>
            <th>Modifications</th>
            <th>Serviceperson's Contact</th>
        </x-slot>
        <x-slot name="tableData">
            @if($data)
                @foreach($data as $row)
                    @if (!$row->isCreation())
                        <tr class="">
                            <td class="w40"><span>{{$loop->iteration}}</span></td>
                            <td class="d-flex">
                            <span class="avatar avatar-blue" data-toggle="tooltip" title=""
                                  data-original-title="Avatar Name">
                                <img src="{{$row->image}}" alt="">
                            </span>
                                <div class="ml-3">
                                    <h6 class="mb-0">
                                        <a href="{{route('servicepeople.show', $row->number)}}">
                                            {{$row->name}}
                                        </a>
                                    </h6>
                                    <span class="text-muted">
                            {{$row->job}} - {{$row->company_slug}}
                        </span>
                                </div>
                            </td>
                            <td class="">
                                @include('livewire.approval-system.partials.modification-collapse')
                            </td>
                            <td>
                                <div class="ml-3">
                                    <h6 class="mb-0">
                                        @if(count($row->phoneNumbers) > 0)
                                            @foreach($row->phoneNumbers->slice(0 ,1) as $phone)
                                                <a href="tel:{{$phone->number}}"><span><li
                                                            style="list-style: none">{{$phone->formatted_number ?? ''}}</li></span></a>
                                            @endforeach
                                        @else
                                            <span> No Phone number Submitted </span>
                                        @endif
                                    </h6>

                                    @foreach($row->emailAddresses->slice(0 ,1) as $email)
                                        <a href="mailto:{{$email->email}}"><span class="text-muted"><li
                                                    style="list-style: none">{{$email->email}}</li></span></a>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </x-slot>
        <x-slot name="pagination">
            {{$data->onEachSide(1)->links()}}
        </x-slot>
    </x-approval-system.approval-system-card>

    @push('livewire-scripts')
        <script src="{{asset('js/main.js')}}"></script>
        <script>
            livewireApprovalConfirmation('approveServiceperson','approveServicepersonModification')
            livewireRejectionConfirmation('disapproveServiceperson', 'approveServicepersonModification')
            reloadTab()
        </script>
    @endpush
</div>
