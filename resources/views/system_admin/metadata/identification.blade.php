<x-layouts.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#dp-types" href="javascript:;"
           class="flex items-center active mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Types
        </a>
        <a data-toggle="tab" data-target="#dp-transaction-code" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Codes
        </a>
        <a data-toggle="tab" data-target="#dp-classes" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Classes
        </a>
        <a data-toggle="tab" data-target="#gender" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Genders
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="dp-types">
            <livewire:system-admin.metadata.identification.drivers-permit.type-component />
        </div>
        <div class="tab-content__pane" id="dp-transaction-code">
            <livewire:system-admin.metadata.identification.drivers-permit.transaction-code-component />
        </div>
        <div class="tab-content__pane" id="dp-classes">
            <livewire:system-admin.metadata.identification.drivers-permit.class-component />
        </div>
        <div class="tab-content__pane" id="gender">
            <livewire:system-admin.metadata.identification.gender-component />
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>
