<div>
    <x-layout.side-menu title="Job">
        <x-slot name="menuItems">
            <x-button.menu-item title="Job" field="job" :menuItem="$menuItem" icon="user" />
            <x-button.menu-item title="Job Title" field="jobTitle" :menuItem="$menuItem" icon="user" />
            <x-button.menu-item title="Job Title Category" field="jobTitleCategory" :menuItem="$menuItem" icon="user" />
            <x-button.menu-item title="Job Classes" field="jobClasses" :menuItem="$menuItem" icon="user" />
        </x-slot>
        <x-slot name="content">
            @switch($menuItem)
                @case('jobTitle')
                This is the title
                <livewire:manpower.career-management.job.job-title-component/>
                @break

                @case('jobTitleCategory')
                This is the category
{{--                <livewire:manpower.career-management.job.job-title-category-component/>--}}
                @break

                @case('jobClasses')
                This is the class
{{--                <livewire:manpower.career-management.job.job-class-component/>--}}
                @break

                @default
                <livewire:manpower.career-management.job.job-component/>
            @endswitch
        </x-slot>
    </x-layout.side-menu>
</div>
