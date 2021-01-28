<x-modal.livewire.dialog title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="stream_id" label="Stream" placeholder="Select Stream">
            @foreach ($streams as $stream)
                <option value="{{$stream->id}}">{{$stream->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-select model="rank_id" label="Rank" placeholder="Select Rank">
            @foreach ($ranks as $rank)
                <option value="{{$rank->id}}">{{$rank->regiment}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>

    <div class="mt-2">
        <x-form.input.livewire-text model="establishment" label="Establishment" placeholder="Enter Establishment" />
    </div>
</x-modal.livewire.dialog>

