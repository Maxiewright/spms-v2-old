<x-layout.side-menu-tabs sub-head="Career Management" title="PDCM">
    <x-slot name="tabs">
        <x-link.tab target="branch" icon="chevrons-right" title="Branch" class="active" />
        <x-link.tab target="branch-establishment" icon="chevrons-right" title="Branch Establishment"/>
        <x-link.tab target="streams" icon="chevrons-right" title="Streams"/>
        <x-link.tab target="stream-establishment" icon="chevrons-right" title="Stream Establishment"/>
        <x-link.tab target="career-paths" icon="chevrons-right" title="Career Paths"/>
        <x-link.tab target="career-path-establishment" icon="chevrons-right" title="Career Path Establishment"/>
        <x-link.tab target="specialties" icon="chevrons-right" title="specialties" class="mb-5" />
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
        <div class="tab-content__pane" id="specialties">
            <livewire:manpower.career-management.career-management-system.specialty-component />
        </div>
    </x-slot>
</x-layout.side-menu-tabs>
