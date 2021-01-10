<x-layouts.side-menu-tabs sub-head="Career Management | Career Management System" title="Career Management System">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#branch" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Branch
        </a>
        <a data-toggle="tab" data-target="#branch-establishment" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Branch Establishment
        </a>
        <a data-toggle="tab" data-target="#streams" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Streams
        </a>
        <a data-toggle="tab" data-target="#stream-establishment" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Stream Establishment
        </a>
        <a data-toggle="tab" data-target="#career-paths" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Career Paths
        </a>
        <a data-toggle="tab" data-target="#career-path-establishment" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Career Path Establishment
        </a>
        <a data-toggle="tab" data-target="#specialities" href="javascript:;"
           class="flex items-center">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Specialities
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="branch">
            <livewire:manpower.career-management.career-management-system.branch-component/>
        </div>
        <div class="tab-content__pane" id="branch-establishment">
            <livewire:manpower.career-management.career-management-system.branch-establishment-component/>
        </div>
        <div class="tab-content__pane" id="streams">
            <livewire:manpower.career-management.career-management-system.stream-component/>
        </div>
        <div class="tab-content__pane" id="stream-establishment">
            <livewire:manpower.career-management.career-management-system.stream-establishment-component />
        </div>
        <div class="tab-content__pane" id="career-paths">
            <livewire:manpower.career-management.career-management-system.career-path-component />
        </div>
        <div class="tab-content__pane" id="career-path-establishment">
            <livewire:manpower.career-management.career-management-system.career-path-establishment-component />
        </div>
        <div class="tab-content__pane" id="specialities">
{{--            <livewire:manpower.career-management.career-management-system.specialities />--}}
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>
