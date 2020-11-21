<div id="accordion">
    <button class="btn btn-link mb-1" data-toggle="collapse"
            data-target="#modification{{$loop->index}}" aria-expanded="true"
            aria-controls="modification{{$loop->index}}">
        View {{lcfirst($title)}} data.
    </button>
    <div class="collapse" id="modification{{$loop->index}}">
        <ul class="list-group list-group-flush" style="list-style: none">
            @foreach($row->modifications as $modification)
                <table class="table table-sm table-striped table-borderless">
                    <tr>
                        <td colspan="3" class="mb-2">
                            {{'On '.$modification->created_at->format('d M Y').' '
                        .$modification->modifier->name.' added the following details:'}}
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
                               wire:click="$emit('approve{{$title}}','{{auth()->id()}}', '{{$modification->id}}')"
                               data-toggle="tooltip" data-placement="top"
                               title="Approve Modification" class="p-3"
                            >
                                <i class="fa fa-sm fa-check text-success"></i>
                            </a>
                            <a href="#"
                               wire:click="$emit('disapprove{{$title}}','{{auth()->id()}}', '{{$modification->id}}')"
                               data-toggle="tooltip" data-placement="top"
                               title="Reject Modification" class="p-3"
                            >
                                <i class="fa fa-sm fa-remove text-danger"></i>
                            </a>
                        </td>
                        <td class="align-right">
                            @if ($modification->modifier->serviceperson->number)
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
                                    <a href="mailto:{{$email->email}}">
                                        <span class="text-muted">
                                            <li style="list-style: none">{{$email->email}}</li>
                                        </span>
                                    </a>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </table>
            @endforeach
        </ul>
    </div>
</div>

