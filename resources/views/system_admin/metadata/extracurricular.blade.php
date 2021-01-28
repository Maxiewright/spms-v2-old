<x-layout.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#sport-type" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Sport Types
        </a>
        <a data-toggle="tab" data-target="#sport" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Sports
        </a>
        <a data-toggle="tab" data-target="#hobby-type" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Hobby Types
        </a>
        <a data-toggle="tab" data-target="#hobby" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Hobbies
        </a>
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="sport-type">
            <livewire:system-admin.metadata.extracurricular.sport-type-component />
        </div>
        <div class="tab-content__pane" id="sport">
            <livewire:system-admin.metadata.extracurricular.sport-component />
        </div>
        <div class="tab-content__pane" id="hobby-type">
            <livewire:system-admin.metadata.extracurricular.hobby-type-component />
        </div>
        <div class="tab-content__pane" id="hobby">
            <livewire:system-admin.metadata.extracurricular.hobby-component />
        </div>
    </x-slot>
</x-layout.side-menu-tabs>
