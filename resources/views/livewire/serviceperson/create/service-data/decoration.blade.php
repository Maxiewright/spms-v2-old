<div>
    @foreach ($inputs as $input)
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
            <x-form.input.livewire-select model="data.decoration.0.decoration_id"
                                          placeholder="Select Decoration"
                                          label="Decoration" class="sm:col-span-6">
                @foreach($decorations as $decoration)
                    <option
                        value="{{$decoration->id}}">{{$decoration->name}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-date model="data.decoration.0.date_received" label="Date Received"
                                        placeholder="Date Received" class=" sm:col-span-5"/>
            {{--Add / Remove Btns --}}
            @if ($input > 1)
                <x-buttons.remove-field field="{{$loop->index}}"/>
            @else
                <x-buttons.add-field/>
            @endif

        </div>
    @endforeach
</div>
