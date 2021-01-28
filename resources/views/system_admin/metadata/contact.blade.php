<x-layout.side-menu-tabs sub-head="Metadata" title="Contact">
    <x-slot name="tabs">
{{--        <a data-toggle="tab" data-target="#divisions" href="javascript:;"--}}
{{--           class="flex items-center active">--}}
{{--            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Division or Regions--}}
{{--        </a>--}}
{{--        <a data-toggle="tab" data-target="#cities" href="javascript:;"--}}
{{--           class="flex items-center">--}}
{{--            <i data-feather="activity" class="w-4 h-4 mr-2"></i>City or Towns--}}
{{--        </a>--}}

        <a data-toggle="tab" data-target="#divisions" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i> Divisions
        </a>
        <a data-toggle="tab" data-target="#cities" href="javascript:;"
           class="flex items-center mt-5">
            <i data-feather="box" class="w-4 h-4 mr-2"></i> Cities
        </a>


    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="divisions">
            <livewire:system-admin.metadata.contact.division-or-region-component />
        </div>
        <div class="tab-content__pane" id="cities">
            <livewire:system-admin.metadata.contact.city-or-town-component />
        </div>
    </x-slot>
</x-layout.side-menu-tabs>
