<div class="col-span-12 grid grid-cols-12 gap-2 row-gap-5">
    <x-form.input.livewire-select model="data.weight.weight"
                                  placeholder="Weight"
                                  label="Weight (In KG)" class="sm:col-span-4">
        @foreach($weights as $weight)
            <option value="{{$weight->id}}">
                {{$weight->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>
    <x-form.input.livewire-date model="data.weight.weighed_on" label="Date Weighed"
                                placeholder="Date Weighed" class="sm:col-span-6" />

    <x-buttons.add-field class="mt-3" />
</div>
