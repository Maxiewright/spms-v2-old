<div>
    <x-approval-system.approval-system-card title="{{$title}}">
        <x-slot name="tableHeaders">
            <th>Serviceperson</th>
            <th>{{ $title }} Creation</th>
            <th>Serviceperson Contact</th>
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
                                <img src="{{$row->serviceperson->first()->image}}" alt="">
                            </span>
                                <div class="ml-3">
                                    <h6 class="mb-0">
                                        <a href="{{route('servicepeople.show', $row->serviceperson->first()->number)}}">
                                            {{$row->serviceperson->first()->name}}
                                        </a>
                                    </h6>
                                    <span class="text-muted">
                            {{$row->serviceperson->first()->job}} - {{$row->serviceperson->first()->company_slug}}
                        </span>
                                </div>
                            </td>
                            <td class="">
                                <div id="accordion">
                                    <button class="btn btn-link mb-1" data-toggle="collapse"
                                            data-target="#modification{{$loop->index}}" aria-expanded="true"
                                            aria-controls="modification{{$loop->index}}">
                                        View {{lcfirst($title)}} data created for
                                        to {{$row->serviceperson->first()->rank.' '.$row->serviceperson->first()->last_name}}.
                                    </button>
                                    <div class="collapse" id="modification{{$loop->index}}">
                                        <ul class="list-group list-group-flush" style="list-style: none">

                                            @foreach($row->modifications as $modification)
                                                <table class="table table-sm table-striped table-borderless">
                                                    <tr>
                                                        <td colspan="3" class="mb-2">
                                                            {{'On '.$modification->created_at->format('d M Y').' '
                                                        .$modification->modifier->name.' added the following details for '. $row->serviceperson->first()->name}}
                                                        </td>
                                                    </tr>
                                                    @foreach ($row->modification_details  as $key => $details)
                                                        @if($details->modified != null)
                                                            <tr class="mb-2">
                                                                <td>{{$loop->iteration}}</td>
                                                                <th scope="row" style="width:25%">{{$key}}</th>
                                                                <td>{{$details->modified}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="#"
                                                               wire:click="$emit('approveDependent','{{auth()->id()}}', '{{$modification->id}}')"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Approve Modification" class="p-3"
                                                            >
                                                                <i class="fa fa-sm fa-check text-success"></i>
                                                            </a>
                                                            <a href="#"
                                                               wire:click="$emit('disapproveDependent','{{auth()->id()}}', '{{$modification->id}}')"
                                                               data-toggle="tooltip" data-placement="top"
                                                               title="Reject Modification" class="p-3"
                                                            >
                                                                <i class="fa fa-sm fa-remove text-danger"></i>
                                                            </a>
                                                        </td>
                                                        <td class="align-right">
                                                            @if ($modification->modifier->serviceperson->number != $row->serviceperson->first()->number)
                                                                <li>
                                                                    Creator's Contact:
                                                                    <h6 class="mb-0">
                                                                        @foreach($modification->modifier->serviceperson->phoneNumbers->slice(0 ,1) as $phone)
                                                                            <a href="tel:{{$phone->number}}">
                                                                <li style="list-style: none">{{$phone->formatted_number ?? ''}}</li>
                                                                </a>
                                                                @endforeach
                                                                </h6>
                                                                @foreach($modification->modifier->serviceperson->emailAddresses->slice(0 ,1) as $email)
                                                                    <a href="mailto:{{$email->email}}"><span
                                                                            class="text-muted"><li
                                                                                style="list-style: none">{{$email->email}}</li></span></a>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="ml-3">
                                    <h6 class="mb-0">
                                        @if(count($row->serviceperson->first()->phoneNumbers) > 0)
                                            @foreach($row->serviceperson->first()->phoneNumbers->slice(0 ,1) as $phone)
                                                <a href="tel:{{$phone->number}}"><span><li
                                                            style="list-style: none">{{$phone->formatted_number ?? ''}}</li></span></a>
                                            @endforeach
                                        @else
                                            <span> No Phone number Submitted </span>
                                        @endif
                                    </h6>

                                    @foreach($row->serviceperson->first()->emailAddresses->slice(0 ,1) as $email)
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
        <script>
            livewireApprovalConfirmation('approveDependent', 'approveDependentModification')
            livewireRejectionConfirmation('disapproveDependent', 'disapproveDependentModification')
        </script>
    @endpush
</div>

