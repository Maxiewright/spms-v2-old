<div class="col-span-12 grid grid-cols-12 gap-4 row-gap-5">
    <x-form.input.livewire-select model="data.height.height"
                                  placeholder="Select Height"
                                  label="Height (In CM)" class="sm:col-span-5">
        @foreach($heights as $height)
            <option value="{{$height->id}}">
                {{$height->name}}
            </option>
        @endforeach
    </x-form.input.livewire-select>
    <x-form.input.livewire-date model="data.height.measured_on" label="Date Measured"
                                placeholder="Date Measured" class="sm:col-span-5" />

    <x-buttons.add-field class="mt-3" />
</div>
