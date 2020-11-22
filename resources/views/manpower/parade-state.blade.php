@extends('../layout/' . $layout)

@section('subhead')
    <title>Parade State</title>
@endsection

@section('subcontent')

    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">


        <!-- BEGIN: Parade State-->
        <div class="col-span-12 mt-8">
            <x-layouts.page-header title="Parade State" />
            <!-- BEGIN: Parade State Summary -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <x-cards.info-card title="Available" data-feather="shield" counter="{{$status->available}}"/>
                <x-cards.info-card title="Annual Leave" data-feather="briefcase" counter="{{$status->privilegeLeave}}"/>
                <x-cards.info-card title="Sick Leave"  data-feather="shield-off" counter="{{$status->sickLeave}}"/>
                <x-cards.info-card title="Internal Trg" data-feather="book" counter="{{$status->internalTraining}}"/>
                <x-cards.info-card title="In-Service" data-feather="book-open" counter="{{$status->inServiceTraining}}"/>
                <x-cards.info-card title="Resettlement" data-feather="sunset"  counter="{{$status->resettlement}}"/>
            </div>
        </div>
        <!-- End: Parade State Summary -->


        <!-- BEGIN: Parade State -->
        <x-tables.responsive-table title="Parade State" options="">
                <x-slot name="thead">
                    <x-tables.responsive.th details="Details"/>
                    <x-tables.responsive.th details="Col"/>
                    <x-tables.responsive.th details="Lt Col"/>
                    <x-tables.responsive.th details="Maj"/>
                    <x-tables.responsive.th details="Cpt"/>
                    <x-tables.responsive.th details="Lt"/>
                    <x-tables.responsive.th details="2 Lt"/>
                    <x-tables.responsive.th details="Ocdt"/>
                    <x-tables.responsive.th details="WO1"/>
                    <x-tables.responsive.th details="WO2"/>
                    <x-tables.responsive.th details="SSgt"/>
                    <x-tables.responsive.th details="Sgt"/>
                    <x-tables.responsive.th details="Cpl"/>
                    <x-tables.responsive.th details="LCpl"/>
                    <x-tables.responsive.th details="Pte"/>
                    <x-tables.responsive.th details="Rec"/>
                </x-slot>
                <x-slot name="tbody">
                    <tr>
                        <td scope="row">Current Strength</td>
                        <td><span>{{$colonel->total}}</span></td>
                        <td><span>{{$lieutenantColonel->total}}</span></td>
                        <td><span>{{$major->total}}</span></td>
                        <td><span>{{$captain->total}}</span></td>
                        <td><span>{{$lieutenant->total}}</span></td>
                        <td><span>{{$secondLieutenant->total}}</span></td>
                        <td><span>{{$officerCadet->total}}</span></td>
                        <td><span>{{$warrantOfficerOne->total}}</span></td>
                        <td><span>{{$warrantOfficerTwo->total}}</span></td>
                        <td><span>{{$staffSergeant->total}}</span></td>
                        <td><span>{{$sergeant->total}}</span></td>
                        <td><span>{{$corporal->total}}</span></td>
                        <td><span>{{$lanceCorporal->total}}</span></td>
                        <td><span>{{$private->total}}</span></td>
                        <td><span>{{$recruit->total}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Privilege Leave</td>
                        <td><span>{{$colonel->privilegeLeave}}</span></td>
                        <td><span>{{$lieutenantColonel->privilegeLeave}}</span></td>
                        <td><span>{{$major->privilegeLeave}}</span></td>
                        <td><span>{{$captain->privilegeLeave}}</span></td>
                        <td><span>{{$lieutenant->privilegeLeave}}</span></td>
                        <td><span>{{$secondLieutenant->privilegeLeave}}</span></td>
                        <td><span>{{$officerCadet->privilegeLeave}}</span></td>
                        <td><span>{{$warrantOfficerOne->privilegeLeave}}</span></td>
                        <td><span>{{$warrantOfficerTwo->privilegeLeave}}</span></td>
                        <td><span>{{$staffSergeant->privilegeLeave}}</span></td>
                        <td><span>{{$sergeant->privilegeLeave}}</span></td>
                        <td><span>{{$corporal->privilegeLeave}}</span></td>
                        <td><span>{{$lanceCorporal->privilegeLeave}}</span></td>
                        <td><span>{{$private->privilegeLeave}}</span></td>
                        <td><span>{{$recruit->privilegeLeave}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Sick Leave</td>
                        <td><span>{{$colonel->sickLeave}}</span></td>
                        <td><span>{{$lieutenantColonel->sickLeave}}</span></td>
                        <td><span>{{$major->sickLeave}}</span></td>
                        <td><span>{{$captain->sickLeave}}</span></td>
                        <td><span>{{$lieutenant->sickLeave}}</span></td>
                        <td><span>{{$secondLieutenant->sickLeave}}</span></td>
                        <td><span>{{$officerCadet->sickLeave}}</span></td>
                        <td><span>{{$warrantOfficerOne->sickLeave}}</span></td>
                        <td><span>{{$warrantOfficerTwo->sickLeave}}</span></td>
                        <td><span>{{$staffSergeant->sickLeave}}</span></td>
                        <td><span>{{$sergeant->sickLeave}}</span></td>
                        <td><span>{{$corporal->sickLeave}}</span></td>
                        <td><span>{{$lanceCorporal->sickLeave}}</span></td>
                        <td><span>{{$private->sickLeave}}</span></td>
                        <td><span>{{$recruit->sickLeave}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Internal Training</td>
                        <td><span>{{$colonel->internalTraining}}</span></td>
                        <td><span>{{$lieutenantColonel->internalTraining}}</span></td>
                        <td><span>{{$major->internalTraining}}</span></td>
                        <td><span>{{$captain->internalTraining}}</span></td>
                        <td><span>{{$lieutenant->internalTraining}}</span></td>
                        <td><span>{{$secondLieutenant->internalTraining}}</span></td>
                        <td><span>{{$officerCadet->internalTraining}}</span></td>
                        <td><span>{{$warrantOfficerOne->internalTraining}}</span></td>
                        <td><span>{{$warrantOfficerTwo->internalTraining}}</span></td>
                        <td><span>{{$staffSergeant->internalTraining}}</span></td>
                        <td><span>{{$sergeant->internalTraining}}</span></td>
                        <td><span>{{$corporal->internalTraining}}</span></td>
                        <td><span>{{$lanceCorporal->internalTraining}}</span></td>
                        <td><span>{{$private->internalTraining}}</span></td>
                        <td><span>{{$recruit->internalTraining}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">In-service Training</td>
                        <td><span>{{$colonel->inServiceTraining}}</span></td>
                        <td><span>{{$lieutenantColonel->inServiceTraining}}</span></td>
                        <td><span>{{$major->inServiceTraining}}</span></td>
                        <td><span>{{$captain->inServiceTraining}}</span></td>
                        <td><span>{{$lieutenant->inServiceTraining}}</span></td>
                        <td><span>{{$secondLieutenant->inServiceTraining}}</span></td>
                        <td><span>{{$officerCadet->inServiceTraining}}</span></td>
                        <td><span>{{$warrantOfficerOne->inServiceTraining}}</span></td>
                        <td><span>{{$warrantOfficerTwo->inServiceTraining}}</span></td>
                        <td><span>{{$staffSergeant->inServiceTraining}}</span></td>
                        <td><span>{{$sergeant->inServiceTraining}}</span></td>
                        <td><span>{{$corporal->inServiceTraining}}</span></td>
                        <td><span>{{$lanceCorporal->inServiceTraining}}</span></td>
                        <td><span>{{$private->inServiceTraining}}</span></td>
                        <td><span>{{$recruit->inServiceTraining}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Foreign Military Training</td>
                        <td><span>{{$colonel->overseasTraining}}</span></td>
                        <td><span>{{$lieutenantColonel->overseasTraining}}</span></td>
                        <td><span>{{$major->overseasTraining}}</span></td>
                        <td><span>{{$captain->overseasTraining}}</span></td>
                        <td><span>{{$lieutenant->overseasTraining}}</span></td>
                        <td><span>{{$secondLieutenant->overseasTraining}}</span></td>
                        <td><span>{{$officerCadet->overseasTraining}}</span></td>
                        <td><span>{{$warrantOfficerOne->overseasTraining}}</span></td>
                        <td><span>{{$warrantOfficerTwo->overseasTraining}}</span></td>
                        <td><span>{{$staffSergeant->overseasTraining}}</span></td>
                        <td><span>{{$sergeant->overseasTraining}}</span></td>
                        <td><span>{{$corporal->overseasTraining}}</span></td>
                        <td><span>{{$lanceCorporal->overseasTraining}}</span></td>
                        <td><span>{{$private->overseasTraining}}</span></td>
                        <td><span>{{$recruit->overseasTraining}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">Resettlement</td>
                        <td><span>{{$colonel->resettlement}}</span></td>
                        <td><span>{{$lieutenantColonel->resettlement}}</span></td>
                        <td><span>{{$major->resettlement}}</span></td>
                        <td><span>{{$captain->resettlement}}</span></td>
                        <td><span>{{$lieutenant->resettlement}}</span></td>
                        <td><span>{{$secondLieutenant->resettlement}}</span></td>
                        <td><span>{{$officerCadet->resettlement}}</span></td>
                        <td><span>{{$warrantOfficerOne->resettlement}}</span></td>
                        <td><span>{{$warrantOfficerTwo->resettlement}}</span></td>
                        <td><span>{{$staffSergeant->resettlement}}</span></td>
                        <td><span>{{$sergeant->resettlement}}</span></td>
                        <td><span>{{$corporal->resettlement}}</span></td>
                        <td><span>{{$lanceCorporal->resettlement}}</span></td>
                        <td><span>{{$private->resettlement}}</span></td>
                        <td><span>{{$recruit->resettlement}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row">AWOL</td>
                        <td><span>{{$colonel->awol}}</span></td>
                        <td><span>{{$lieutenantColonel->awol}}</span></td>
                        <td><span>{{$major->awol}}</span></td>
                        <td><span>{{$captain->awol}}</span></td>
                        <td><span>{{$lieutenant->awol}}</span></td>
                        <td><span>{{$secondLieutenant->awol}}</span></td>
                        <td><span>{{$officerCadet->awol}}</span></td>
                        <td><span>{{$warrantOfficerOne->awol}}</span></td>
                        <td><span>{{$warrantOfficerTwo->awol}}</span></td>
                        <td><span>{{$staffSergeant->awol}}</span></td>
                        <td><span>{{$sergeant->awol}}</span></td>
                        <td><span>{{$corporal->awol}}</span></td>
                        <td><span>{{$lanceCorporal->awol}}</span></td>
                        <td><span>{{$private->awol}}</span></td>
                        <td><span>{{$recruit->awol}}</span></td>
                    </tr>
                    <tr>
                        <td scope="row"><strong>Available</strong></td>
                        <td><span><strong>{{$colonel->available}}</strong></span></td>
                        <td><span><strong>{{$lieutenantColonel->available}}</strong></span></td>
                        <td><span><strong>{{$major->available}}</strong></span></td>
                        <td><span><strong>{{$captain->available}}</strong></span></td>
                        <td><span><strong>{{$lieutenant->available}}</strong></span></td>
                        <td><span><strong>{{$secondLieutenant->available}}</strong></span></td>
                        <td><span><strong>{{$officerCadet->available}}</strong></span></td>
                        <td><span><strong>{{$warrantOfficerOne->available}}</strong></span></td>
                        <td><span><strong>{{$warrantOfficerTwo->available}}</strong></span></td>
                        <td><span><strong>{{$staffSergeant->available}}</strong></span></td>
                        <td><span><strong>{{$sergeant->available}}</strong></span></td>
                        <td><span><strong>{{$corporal->available}}</strong></span></td>
                        <td><span><strong>{{$lanceCorporal->available}}</strong></span></td>
                        <td><span><strong>{{$private->available}}</strong></span></td>
                        <td><span><strong>{{$recruit->available}}</strong></span></td>
                    </tr>
                </x-slot>
            </x-tables.responsive-table>
        <!-- END: Parade State -->

    </div>








@endsection
