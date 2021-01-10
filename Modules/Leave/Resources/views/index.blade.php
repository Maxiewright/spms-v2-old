@extends('../layout/' . $layout)

@section('subhead')
    <title>Serviceperson Leave</title>
@endsection

@section('subcontent')
    <x-leave::layout.section-with-nav>
        <x-slot name="nav">
            @include('leave::partials.top-nav')
        </x-slot>
        <x-slot name="action">

        </x-slot>
        <x-slot name="slot">
            <livewire:all-leave/>
        </x-slot>
    </x-leave::layout.section-with-nav>
@endsection


