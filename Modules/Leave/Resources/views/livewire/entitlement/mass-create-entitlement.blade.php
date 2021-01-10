<div>
    <div class="row">
        <div class="col">
            <input wire:model="year" type="year" class="form-control" placeholder="Year">
        </div>
        <div class="col">
            <input type="hidden" wire:model="serviceperson.0" >
            @include('leave::partials.serviceperson-dropdown-select')
        </div>
        <div class="col">
            <x-leave::form.select model="leaveGroupEntitlement.0"
                                  option=""
                                  action="Select Leave Group">
                @foreach ($leaveGroupEntitlements as $leaveGroupEntitlement)
                    <option value="{{$leaveGroupEntitlement->id}}">{{$leaveGroupEntitlement->name}}</option>
                @endforeach
            </x-leave::form.select>
        </div>
        <div class="col">
            <x-leave::buttons.dynamic-input-btn action="add({{$i}})" btnType="success" title="Add Field" icon="plus"/>
        </div>
    </div>
    @foreach($inputs as $key => $value)
        <div class="row">
            <div class="col"></div>
            <div class="col">
{{--            Search Dropdown--}}
                @unless($selectedServiceperson)
                    <div>
                        <input wire:model="search.{{$value}}" placeholder="Search Servicepeople..." class="form-control">
                    </div>
                @else
                    <div class="d-flex justify-content-between form-control">
                        <input type="hidden" wire:model="selectedServicepersonNumber.{{$value}}">
                        <div class="">{{$selectedServiceperson->name}}</div>
                        <i wire:click="$set('selectedServicepersonNumber', null)" class="fa fa-close my-auto"></i>
                    </div>
                @endunless
                @unless($noResults)
                    @foreach ($servicepeople as $serviceperson)
                        <button
                            wire:click="$set('selectedServicepersonNumber', {{$serviceperson->number}})"
                            class="btn btn-light btn-block bg-white border-bottom text-left m-0">
                            {{$serviceperson->name}}
                        </button>
                    @endforeach
                @else
                    <div class="btn btn-light btn-block bg-light text-left border-bottom m-0">
                        No Serviceperson Found...
                    </div>
                @endunless



            </div>
            <div class="col">
                <x-leave::form.select model="leaveGroupEntitlement.{{$value}}"
                                      option=""
                                      action="Select Leave Group">
                    @foreach ($leaveGroupEntitlements as $leaveGroupEntitlement)
                        <option value="{{$leaveGroupEntitlement->id}}">{{$leaveGroupEntitlement->name}}</option>
                    @endforeach
                </x-leave::form.select>
            </div>
            <div class="col">
                <x-leave::buttons.dynamic-input-btn action="remove({{$key}})" btnType="danger" title="Remove Field"
                                                    icon="minus"/>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col align-self-end">
            <input wire:click="store()" class="btn btn-primary" value="Save">
        </div>
    </div>
</div>



