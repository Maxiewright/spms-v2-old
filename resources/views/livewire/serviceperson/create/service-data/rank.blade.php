<div>
    @foreach ($inputs as $input)
        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 p-3">
            <x-form.input.livewire-select model="data.rank.0.rank_id"
                                          placeholder="Select Rank"
                                          label="Rank" class="sm:col-span-5">
                @foreach($ranks as $rank)
                    <option
                        value="{{$rank->id}}">{{$rank->regiment_slug}}
                    </option>
                @endforeach
            </x-form.input.livewire-select>

            <x-form.input.livewire-date model="data.rank.0.promoted_on" label="Promotion Data"
                                        placeholder="Promotion Data" class=" sm:col-span-3"/>

            <x-form.input.livewire-date model="data.rank.0.substantive_on" label="Substantive Date"
                                        placeholder="Substantive Date" class=" sm:col-span-3"/>

            {{--Add / Remove Btns --}}
            @if ($input > 1)
                <x-buttons.remove-field field="{{$loop->index}}"/>
            @else
                <x-buttons.add-field/>
            @endif
        </div>
    @endforeach
</div>


