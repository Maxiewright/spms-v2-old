<x-modal.livewire.dialog title="{{$title}}">
    <div class="" >
        <x-form.input.livewire-select model="branch_id" label="Branch" placeholder="Select Branch" >
            @foreach ($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text placeholder="Enter Stream Name" label="Name" model="name" />
    </div>
    <div class="mt-3">
        <x-form.input.livewire-text placeholder="Enter Stream Abbreviation" label="Short Name" model="slug" />
    </div>
</x-modal.livewire.dialog>

