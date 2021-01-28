@extends('../layout/' . $layout)

@section('subhead')
    <title>Job</title>
@endsection

@section('subcontent')
    <livewire:manpower.job.job-view-component />
@endsection


{{--<x-layout.side-menu-tabs sub-head="Career Management" title="Jobs">--}}
{{--    <x-slot name="tabs">--}}
{{--        <x-link.tab target="jobs" icon="chevrons-right" title="Jobs" class=" test active" />--}}
{{--        <x-link.tab target="job-titles" icon="chevrons-right" title="Job Titles" class="test"/>--}}
{{--        <x-link.tab target="job-title-categories" icon="chevrons-right" title="Job Title Categories" class="test"/>--}}
{{--        <x-link.tab target="job-classes" icon="chevrons-right" title="Job Classes" class="test"/>--}}
{{--    </x-slot>--}}
{{--    <x-slot name="tabContent">--}}

{{--        <div class="tab-content__pane active" id="jobs">--}}
{{--            <livewire:manpower.career-management.job.job-component/>--}}
{{--        </div>--}}
{{--        <div class="tab-content__pane " id="job-titles">--}}
{{--            <livewire:manpower.career-management.job.job-title-component/>--}}
{{--        </div>--}}
{{--        <div class="tab-content__pane " id="job-title-categories">--}}
{{--            <livewire:manpower.career-management.job.job-title-category-component/>--}}
{{--        </div>--}}
{{--        <div class="tab-content__pane " id="job-classes">--}}
{{--            <livewire:manpower.career-management.job.job-class-component/>--}}
{{--        </div>--}}
{{--    </x-slot>--}}
{{--</x-layout.side-menu-tabs>--}}


