@extends('../layout/' . $layout)

@section('subhead')
    <title>Leave Dashboard</title>
@endsection

@section('subcontent')
    <x-leave::layout.section-with-nav>
        <x-slot name="nav">
            @include('leave::partials.top-nav')
        </x-slot>
        <x-slot name="action"></x-slot>
        {{--        Action Cards--}}
        <div class="row clearfix">
            <x-leave::card.action-card class="col-6 col-md-4 col-xl-2" href="" action="Schedule"
                                       icon="icon-calendar" ribbonColor="" ribbonData=""/>

            <x-leave::card.action-card class="col-6 col-md-4 col-xl-2" href="" action="Give Refund"
                                       icon="fa fa-undo" ribbonColor="" ribbonData=""/>

            <x-leave::card.action-card class="col-6 col-md-4 col-xl-2" href="" action="Add Entitlement"
                                       icon="fa fa-plus" ribbonColor="" ribbonData=""/>

            <x-leave::card.action-card class="col-6 col-md-4 col-xl-2" href=""
                                       action="My Leave"
                                       icon="icon-briefcase" ribbonColor="green" ribbonData="122"/>

        </div>

    </x-leave::layout.section-with-nav>

{{-- Add Entitlement --}}
    <x-leave::layout.section>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Create Entitlement</div>
            </div>
            <div class="card-body">
                <livewire:mass-create-entitlement />
            </div>
        </div>
    </x-leave::layout.section>



    {{--    Current and Excessive leave--}}
    <x-leave::layout.section>
        <div class="row">
            <div class="col-12 col-md-6">
                <livewire:current />
            </div>
            <div class="col-12 col-md-6">
                <livewire:excessive />
            </div>
        </div>
    </x-leave::layout.section>
    {{--    Pending Request --}}
    <x-leave::layout.section>
        <livewire:pending />
    </x-leave::layout.section>
@stop










