<x-layouts.side-menu-tabs sub-head="Career Management | Jobs" title="Jobs">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#jobs" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Jobs
        </a>
        <a data-toggle="tab" data-target="#job-titles" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Job Titles
        </a>
        <a data-toggle="tab" data-target="#job-classes" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Job Classes
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="jobs">
            <livewire:manpower.career-management.job.job-component/>
        </div>
        <div class="tab-content__pane " id="job-titles">
            <livewire:manpower.career-management.job.job-title-component/>
        </div>
        <div class="tab-content__pane " id="job-classes">
            <livewire:manpower.career-management.job.job-class-component/>
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>
