@extends('../layout/' . $layout)

@section('subhead')
    <title>{{$serviceperson->name}}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Record Card</h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                @include('servicepeople.show.header.basic_info')
            </div>
            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                @include('servicepeople.show.header.contact_card')
            </div>
            <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 pt-5 lg:pt-0">
                @include('servicepeople.show.header.description')
            </div>
        </div>
        @include('servicepeople.show.header.nav_tabs')
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div class="tab-content__pane active" id="identification">
            @include('servicepeople.show.identification')
        </div>
        <div class="tab-content__pane" id="service-data">
            @include('servicepeople.show.service_data')
        </div>
        <div class="tab-content__pane" id="medical-history">
            @include('servicepeople.show.medical')
        </div>
        <div class="tab-content__pane" id="qualification">
            @include('servicepeople.show.qualifications')
        </div>
        <div class="tab-content__pane" id="dependents">
            @include('servicepeople.show.dependents')
        </div>
        <div class="tab-content__pane" id="extracurricular">
            @include('servicepeople.show.extracurricular')
        </div>
        <div class="tab-content__pane" id="emergency-contacts">
            @include('servicepeople.show.emergency_contacts')
        </div>
        <div class="tab-content__pane" id="emergency-contacts">
            @include('servicepeople.show.profile')
        </div>
    </div>
@endsection
