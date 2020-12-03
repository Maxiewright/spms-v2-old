<div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
    <x-form.input.select-prepend label="Type & Number"
                                 select-model="data.driversPermit.typeId" select-placeholder="Drivers Permit Type"
                                 text-model="data.driversPermit.number" text-placeholder="Drivers Permit Number">
        @foreach ($types as $type)
            <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
    </x-form.input.select-prepend>

    <x-form.input.livewire-select model="data.driversPermit.class"
                                  placeholder="Select Drivers Permit Class"
                                  label="Class" class="mb-3 sm:col-span-6">
        @foreach($classes as $class)
            <option
                value="{{$class->id}}">{{$class->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-select model="data.driversPermit.code" placeholder="Select Drivers Permit Code"
                                  label="Code" class="mb-3 sm:col-span-6">
        @foreach($codes as $code)
            <option
                value="{{$code->id}}">{{$code->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>

    <x-form.input.livewire-date model="data.driversPermit.issue" label="Issue Date"
                                placeholder="Date Issued" class="mb-3 sm:col-span-4"/>
    <x-form.input.livewire-date model="data.driversPermit.expiry" label="Expiry Date"
                                placeholder="Expiry Date" class="mb-3 sm:col-span-4"/>
</div>


