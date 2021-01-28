<x-layout.side-menu-tabs sub-head="Metadata | Basic Info" title="Basic Info">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#ethnicity" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Ethnicity
        </a>
        <a data-toggle="tab" data-target="#religion" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i> Religion
        </a>
        <a data-toggle="tab" data-target="#relationship" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Relationship
        </a>
        <a data-toggle="tab" data-target="#maritial-status" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="settings" class="w-4 h-4 mr-2"></i> Marital Status
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="ethnicity">
            <livewire:system-admin.metadata.basic-info.ethnicity-component/>
        </div>
        <div class="tab-content__pane" id="religion">
            <livewire:system-admin.metadata.basic-info.religion-component/>
        </div>
        <div class="tab-content__pane" id="relationship">
            <livewire:system-admin.metadata.basic-info.relationship-component/>
        </div>
        <div class="tab-content__pane" id="maritial-status">
            <livewire:system-admin.metadata.basic-info.marital-status-component/>
        </div>
    </x-slot>
</x-layout.side-menu-tabs>

