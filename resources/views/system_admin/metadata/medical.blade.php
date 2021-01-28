<x-layout.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#allergy-types" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Allergy Types
        </a>
        <a data-toggle="tab" data-target="#allergies" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Allergies
        </a>
        <a data-toggle="tab" data-target="#medical-conditions" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Medical Conditions
        </a>
        <a data-toggle="tab" data-target="#vaccines" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Vaccines
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="allergy-types">
            <livewire:system-admin.metadata.medical.history.allergy-type-component />
        </div>
        <div class="tab-content__pane" id="allergies">
            <livewire:system-admin.metadata.medical.history.allergy-component />
        </div>
        <div class="tab-content__pane" id="medical-conditions">
            <livewire:system-admin.metadata.medical.history.medical-condition-component />
        </div>
        <div class="tab-content__pane" id="vaccines">
            <livewire:system-admin.metadata.medical.history.vaccine-component />
        </div>
    </x-slot>
</x-layout.side-menu-tabs>
