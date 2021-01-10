<div>
    <form action="" method="post">
        @csrf
        <x-leave::modal.modal-form-row id="leaveEndDate" label="Leave Type:" >
            <x-leave::form.select option="" action="Select ">
                @foreach($types as $type)
                    <option
                        value="{{$type->id}}">{{$type->name}}
                    </option>
                @endforeach
            </x-leave::form.select>
        </x-leave::modal.modal-form-row>

        <x-leave::modal.modal-form-row id="leaveEndDate" label="From:" >
            <x-leave::form.input id="leaveStartDate" type="date" label="Date From" />
        </x-leave::modal.modal-form-row>

        <x-leave::modal.modal-form-row id="leaveEndDate" label="To:" >
            <x-leave::form.input id="leaveEndDate" type="date" label="Date To" />
        </x-leave::modal.modal-form-row>

        <x-leave::modal.modal-form-row id="leaveEndDate" label="Remarks" >
            <x-leave::form.textarea id="remarks" rows="2"/>
        </x-leave::modal.modal-form-row>
    </form>
</div>
