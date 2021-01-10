<div>
    <form wire:submit.prevent="save">
        @csrf
        <x-leave::modal.modal-form-row id="leaveType" label="Leave Type:" >
            <x-leave::form.select model="leave_entitlement.leave_group_entitlement_id"
                                  option=""
                                  action="Select Leave Group">
                @foreach ($leaveGroups as $leaveGroup)
                    <option value="{{$leaveGroup->id}}">{{$leaveGroup->name}}</option>
                @endforeach
            </x-leave::form.select>
        </x-leave::modal.modal-form-row>

        <x-leave::modal.modal-form-row id="year" label="Year" >
            <x-leave::form.input model="leave_entitlement.year" type="text"  label="Year"/>
        </x-leave::modal.modal-form-row>
        <div class="mt-3 text-right">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>

</div>
