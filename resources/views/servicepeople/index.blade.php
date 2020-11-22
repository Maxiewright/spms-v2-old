@extends('../layout/' . $layout)

@section('subhead')
    <title>Servicepeople </title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
            <x-layout.page-header title="Servicepeople" />
            <!-- BEGIN: Servicepeople Summary -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-cards.info-card title="Servicepeople" data-feather="users" counter="{{$strength->total}}"/>
                <x-cards.info-card title="Officers (M)" data-feather="users" counter="{{$strength->maleOfficers}}"/>
                <x-cards.info-card title="Officers (F)" data-feather="users" counter="{{$strength->femaleOfficers}}"/>
                <x-cards.info-card title="Enlisted (M)"  data-feather="users" counter="{{$strength->maleEnlisted}}"/>
                <x-cards.info-card title="Enlisted (F)"  data-feather="users" counter="{{$strength->femaleEnlisted}}"/>
                <x-cards.info-card title="Recruits (M) | (F)"
                                   data-feather="users"
                                   counter="{{$strength->maleRecruits}}  |
                                            {{$strength->femaleRecruits}}"
                />
            </div>
            <!-- END: Servicepeople Summary -->

            <livewire:serviceperson.servicepeople-component />



        </div>
    </div>
@endsection
