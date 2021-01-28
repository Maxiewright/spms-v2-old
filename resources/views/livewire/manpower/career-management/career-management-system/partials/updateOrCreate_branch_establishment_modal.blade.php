<x-modal.livewire.dialog title="{{$title}}">
    {{--Branch--}}
    <div>
        <x-form.input.livewire-select model="branch_id" placeholder="Select Branch" label="Select Branch">
            @foreach ($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    {{--Rank--}}
    <div class="mt-3">
        <x-form.input.livewire-select model="rank_id" placeholder="Select Rank" label="Select Rank" >
            @foreach ($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->regiment}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    {{--    Establishment--}}
    <div class="mt-3">
        <x-form.input.livewire-text model="establishment" placeholder="Establishment" label="Establishment" />
    </div>
</x-modal.livewire.dialog>



