<x-layouts.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#blood-type" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Blood Type
        </a>
        <a data-toggle="tab" data-target="#eye-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Eye Colour
        </a>
        <a data-toggle="tab" data-target="#hair-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Hair Colour
        </a>
        <a data-toggle="tab" data-target="#skin-colour" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Skin Colour
        </a>
        <a data-toggle="tab" data-target="#height" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i>Height
        </a>
        <a data-toggle="tab" data-target="#weight" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i> Weight
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="blood-type">
            <livewire:system-admin.metadata.medical.bio-data.blood-type-component />
        </div>
        <div class="tab-content__pane" id="eye-colour">
            <livewire:system-admin.metadata.medical.bio-data.eye-colour-component />
        </div>
        <div class="tab-content__pane" id="hair-colour">
            <livewire:system-admin.metadata.medical.bio-data.hair-colour-component />
        </div>
        <div class="tab-content__pane" id="skin-colour">
            <livewire:system-admin.metadata.medical.bio-data.skin-colour-component />
        </div>
        <div class="tab-content__pane flex" id="height">
            <livewire:system-admin.metadata.medical.bio-data.height-component />
        </div>
        <div class="tab-content__pane flex" id="weight">
            <livewire:system-admin.metadata.medical.bio-data.weight-component />
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>

