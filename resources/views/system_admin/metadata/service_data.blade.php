<x-layouts.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#enlistment" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Enlistment
        </a>
        <a data-toggle="tab" data-target="#re-engagement" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Re-engagement
        </a>
        <a data-toggle="tab" data-target="#battalions" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Battalions
        </a>
        <a data-toggle="tab" data-target="#companies" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Companies
        </a>
        <a data-toggle="tab" data-target="#platoons" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Platoons
        </a>
        <a data-toggle="tab" data-target="#"sections href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Sections
        </a>
        <a data-toggle="tab" data-target="#decorations" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Decorations
        </a>
        <a data-toggle="tab" data-target="#ranks" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Ranks
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="flex flex-col tab-content__pane active" id="enlistment">
            <livewire:system-admin.metadata.service-data.enlistment.enlistment-type-component />
            <livewire:system-admin.metadata.service-data.enlistment.engagement-period-component />
        </div>
        <div class="tab-content__pane" id="re-engagement">
            <livewire:system-admin.metadata.service-data.re-engagement.re-engagement-period-component />
        </div>
        <div class="tab-content__pane" id="battalions">
            <livewire:system-admin.metadata.service-data.unit.company-component />
        </div>
        <div class="tab-content__pane" id="companies">
            <livewire:system-admin.metadata.service-data.unit.company-component />
        </div>
        <div class="tab-content__pane" id="platoons">
            <livewire:system-admin.metadata.service-data.unit.platoon-component />
        </div>
        <div class="tab-content__pane" id="sections">
            <livewire:system-admin.metadata.service-data.unit.section-component />
        </div>
        <div class="tab-content__pane" id="decorations">
            <livewire:system-admin.metadata.service-data.decoration-component />
        </div>
        <div class="tab-content__pane" id="ranks">
            <livewire:system-admin.metadata.service-data.rank-component />
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>
