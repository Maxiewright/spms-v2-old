<x-approval-system.approval-system-card title="{{$title}}">
    <x-slot name="tableHeaders">
        <th>Serviceperson</th>
        <th>{{ $title }} Creation</th>
        <th>Serviceperson Contact</th>
    </x-slot>
    <x-slot name="tableData">
        @if($data)
            @foreach($data as $row)
                @if ($row->isCreation())
                    @include('livewire.approval-system.partials.approval-system-layout')
                @endif
            @endforeach
        @endif
    </x-slot>
    <x-slot name="pagination">
        {{$data->onEachSide(1)->links()}}
    </x-slot>
</x-approval-system.approval-system-card>
