@extends('layouts.master')

@section('content')

<form action="" method="post">
    @csrf
    <x-leave::modal.modal-form-row id="leaveType" label="Leave Type:" >
        <x-leave::form.select model="typeId" option="" action="Select ">
            @foreach($types as $type)
                {{--                            <option value="">{{$type->name}}</option>--}}
            @endforeach
        </x-leave::form.select>
    </x-leave::modal.modal-form-row>

    <x-leave::modal.modal-form-row id="leaveEndDate" label="From:" >
        <x-leave::form.input model="startDate" type="date" label="Date From" />
    </x-leave::modal.modal-form-row>

    <x-leave::modal.modal-form-row id="leaveEndDate" label="To:" >
        <x-leave::form.input model="endDate" type="date" label="Date To" />
    </x-leave::modal.modal-form-row>

    <x-leave::modal.modal-form-row id="leaveRemarks" label="Remarks" >
        <x-leave::form.textarea model="remarks" rows="2"/>
    </x-leave::modal.modal-form-row>

    <x-leave::modal.modal-form-row id="leaveEndDate" label="Test" >
        <x-leave::form.input model="remarks" type="text"  label="Test"/>
    </x-leave::modal.modal-form-row>
    <div class="mt-3 text-right">
        <input type="submit" class="btn btn-primary" value="Save">
    </div>
</form>

@endsection
