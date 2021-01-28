<x-modal.livewire.dialog title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="career_path_id" label="Career Path" placeholder="Select Career Path">
            @foreach ($careerPaths as $careerPath)
                <option value="{{$careerPath->id}}">{{$careerPath->name}}</option>
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
    <div class="mt-3">
        <x-form.input.livewire-text model="establishment" label="Establishment" placeholder="Enter Establishment" />
    </div>
</x-modal.livewire.dialog>


