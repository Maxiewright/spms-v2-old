<x-search.live-search title="Servicepeople">
    <div class=""  wire:ignore>
        <select wire:model="filterRank" class="form-control custom-select mb-2 mr-sm-2 ">
            <option value="">Filter by Rank</option>
            @foreach ($ranks as $rank)
                <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
            @endforeach
        </select>
    </div>
    {{--        Table header tags goes here (th)--}}
    <x-slot name="tableHeader">
        <th>#</th>
        <th>Serviceperson</th>
        <th>Unit & Job</th>
        <th>Contact</th>
        <th>Service</th>
        <th>Status</th>
    </x-slot>
    {{--    Table body tags goes here, to include foreach loop--}}
    <x-slot name="tableBody">
        @if($servicepeople)
            @foreach($servicepeople as $serviceperson)
                @if (!$serviceperson->isCreation())
                    <tr>
                        <td class="w40">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        {{--                                Serviceperson basic information --}}
                        <td class="d-flex">
                                    <span class="avatar avatar-blue" data-toggle="tooltip" title="" data-original-title="{{$serviceperson->name}}">
                                        <img src="{{$serviceperson->image ?? ''}}" alt="">
                                    </span>
                            <div class="ml-3">
                                <h6 class="mb-0"><a href="{{route('servicepeople.show', $serviceperson->number)}}"> {{$serviceperson->name}}</a></h6>
                                {{--                                            <span class="text-muted"><li style="list-style: none">{{$serviceperson->career_path}} </li></span>--}}
                            </div>
                        </td>
                        {{--                                Serviceperson Unit and Job --}}
                        <td>
                            <div class="ml-3">
                                <h6 class="mb-0">{{$serviceperson->battalion_slug ?? ''}}</h6>
                                <span class="text-muted">
                                {{$serviceperson->currentJobSlug ?? ''}} - {{$serviceperson->coy ?? ''}}
                            </span>
                            </div>
                        </td>
                        {{--                                Serviceperson contact --}}
                        <td>
                            <div class="ml-3">
                                <h6 class="mb-0">
                                    @if(count($serviceperson->phoneNumbers) > 0)
                                        @foreach($serviceperson->phoneNumbers->slice(0 ,1) as $phone)
                                            <a href="tel:{{$phone->number}}"><span><li style="list-style: none">{{$phone->formatted_number ?? ''}}</li></span></a>
                                        @endforeach
                                    @else
                                        <span> No Phone number Submitted </span>
                                    @endif
                                </h6>

                                @foreach($serviceperson->emailAddresses->slice(0 ,1) as $email)
                                    <a href="mailto:{{$email->email}}"><span class="text-muted"><li style="list-style: none">{{$email->email}}</li></span></a>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <span>{{$serviceperson->lastEnlistment->date->diff(new \Carbon\Carbon(now()))->format('%y years, %m months') ?? ''}}</span>
                        </td>

                        <td><span>{{$serviceperson->currentStatus}}</span></td>
                    </tr>

                @endif
            @endforeach
        @endif
            <x-slot name="pagination">{{$servicepeople->links()}}</x-slot>
    </x-slot>
</x-search.live-search>
