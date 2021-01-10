@extends('../layout/' . $layout)

@section('subhead')
    <title>Leave Adjustment</title>
@endsection

@section('subcontent')
    <x-leave::layout.section-with-nav>
        <x-slot name="nav">
            @include('leave::partials.top-nav')
        </x-slot>
        <x-slot name="action">

        </x-slot>
        <x-slot name="slot">
            <livewire:adjustments/>
        </x-slot>
    </x-leave::layout.section-with-nav>
@endsection
