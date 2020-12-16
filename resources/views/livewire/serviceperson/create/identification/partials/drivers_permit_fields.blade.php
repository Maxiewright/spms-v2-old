<x-form.input.select-prepend label="Type & Number"
                             select-model="data.drivers_permit.0.drivers_permit_type_id" select-placeholder="Drivers Permit Type"
                             text-model="data.drivers_permit.0.number" text-placeholder="Drivers Permit Number">
    @foreach ($types as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
    @endforeach
</x-form.input.select-prepend>

<x-form.input.livewire-select model="data.drivers_permit.0.drivers_permit_class_id"
                              placeholder="Select Drivers Permit Class"
                              label="Class" class="mb-3 sm:col-span-6">
    @foreach($classes as $class)
        <option
            value="{{$class->id}}">{{$class->name}}
        </option>
    @endforeach
</x-form.input.livewire-select>

<x-form.input.livewire-select model="data.drivers_permit.0.drivers_permit_transaction_code_id" placeholder="Select Drivers Permit Code"
                              label="Code" class="mb-3 sm:col-span-6">
    @foreach($codes as $code)
        <option
            value="{{$code->id}}">{{$code->name}}
        </option>
    @endforeach
</x-form.input.livewire-select>

<x-form.input.livewire-date model="data.drivers_permit.0.issued_on" label="Issue Date"
                            placeholder="Date Issued" class="mb-3 sm:col-span-4"/>
<x-form.input.livewire-date model="data.drivers_permit.0.expired_on" label="Expiry Date"
                            placeholder="Expiry Date" class="mb-3 sm:col-span-4"/>
