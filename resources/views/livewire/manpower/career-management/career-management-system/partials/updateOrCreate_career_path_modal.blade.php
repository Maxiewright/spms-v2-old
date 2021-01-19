<x-crud.livewire-crud-modal title="{{$title}}">
    <div class="">
        <x-form.input.livewire-select model="stream_id" label="Stream" placeholder="Select Stream">
            @foreach ($streams as $stream)
                <option value="{{$stream->id}}">{{$stream->name}}</option>
            @endforeach
        </x-form.input.livewire-select>
    </div>
    <div class="mt-3" >
        <x-form.input.livewire-text model="name" label="Name" placeholder="Enter Career Path Name" />
    </div>
    <div class="mt-3" >
        <x-form.input.livewire-text model="slug" label="Short Name" placeholder="Enter Career Path Short Name" />
    </div>
</x-crud.livewire-crud-modal>

