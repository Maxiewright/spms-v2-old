<x-tables.data-table data-feather="plus">
    <x-slot name="action">
        <a href="$" class="button text-white bg-theme-1 shadow-md mr-2">Add Serviceperson</a>
    </x-slot>
    <x-slot name="filters">
        <div class="mr-2">
            <select wire:model="filterRank"  data-placeholder="Filter by Rank" class="input box pr-10 w-full" >
                <option value="">Filter by Rank</option>
                @foreach ($ranks as $rank)
                    <option {{$rankId == $rank->id ? 'selected' : ''}} value="{{$rank->id}}">{{$rank->regiment_slug}}</option>
                @endforeach
            </select>
        </div>
    </x-slot>
    <x-slot name="thead">
        <th class="whitespace-no-wrap uppercase">#</th>
        <th class="whitespace-no-wrap uppercase">Serviceperson</th>
        <th class="whitespace-no-wrap uppercase">Unit & Job</th>
        <th class="whitespace-no-wrap uppercase">Contact</th>
        <th class="whitespace-no-wrap uppercase">Service</th>
        <th class="text-center whitespace-no-wrap uppercase">Status</th>
        <th class="text-center whitespace-no-wrap uppercase">Actions</th>
    </x-slot>
    <x-slot name="tbody">
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
                        <td class="">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img class="tooltip rounded-full"
                                         src="{{$serviceperson->image ?? ''}}"
                                         title="{{$serviceperson->name}}">
                                </div>
                                <a href="" class="hover:text-blue-600 text-base ml-3 align-middle">{{$serviceperson->name}}</a>
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

                        <td class="w-40">
                            <div class="flex items-center justify-center">
                                {{$serviceperson->currentStatus}}
                            </div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;">
                                    <i data-feather="eye" class="w-4 h-4 mr-1"></i>
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </x-slot>
    <x-slot name="pagination">{{$servicepeople->links()}}</x-slot>
</x-tables.data-table>

