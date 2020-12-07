@extends('../layout/' . $layout)

@section('subhead')
    <title>Create Serviceperson</title>
@endsection

@section('subcontent')
    <div class="flex items-center mt-8">
        <h2 class="intro-y text-lg font-medium mr-auto">Create Serviceperson</h2>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
{{--        <livewire:serviceperson.create.nav />--}}
        <livewire:serviceperson.create-serviceperson-component />
    </div>
    <!-- END: Wizard Layout -->
@endsection
