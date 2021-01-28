<x-layout.side-menu-tabs sub-head="Career Management" title="Qualification">
    <x-slot name="tabs">
        <x-link.tab target="course-types" icon="chevrons-right" title="Course Types" class="active" />
        <x-link.tab target="course-institutions" icon="chevrons-right" title="Course Institutions"  />
        <x-link.tab target="courses" icon="chevrons-right" title="Courses"  />
        <x-link.tab target="course-qualifications" icon="chevrons-right" title="Course Qualifications"  />
        <x-link.tab target="education-levels" icon="chevrons-right" title="Education Levels"  />
        <x-link.tab target="subjects" icon="chevrons-right" title="Subjects"  />
        <x-link.tab target="school-types" icon="chevrons-right" title="School Types"  />
        <x-link.tab target="school-district" icon="chevrons-right" title="School Districts"  />
        <x-link.tab target="schools" icon="chevrons-right" title="Schools"  />
    </x-slot>
    <x-slot name="tabContent">
        <div class="tab-content__pane active" id="course-types">
            <livewire:manpower.career-management.qualification.course.course-type-component/>
        </div>
        <div class="tab-content__pane " id="course-institutions">
            <livewire:manpower.career-management.qualification.course.course-institution-component/>
        </div>
        <div class="tab-content__pane " id="courses">
            <livewire:manpower.career-management.qualification.course.course-component/>
        </div>
        <div class="tab-content__pane " id="course-qualifications">
            <livewire:manpower.career-management.qualification.course.course-qualification-component/>
        </div>
        <div class="tab-content__pane " id="education-levels">
            <livewire:manpower.career-management.qualification.education.education-level-component/>
        </div>
        <div class="tab-content__pane " id="subjects">
            <livewire:manpower.career-management.qualification.education.subject-component/>
        </div>
        <div class="tab-content__pane " id="school-types">
            <livewire:manpower.career-management.qualification.education.school-type-component/>
        </div>
        <div class="tab-content__pane " id="school-districts">
            <livewire:manpower.career-management.qualification.education.school-district-component/>
        </div>
        <div class="tab-content__pane " id="schools">
            <livewire:manpower.career-management.qualification.education.school-component/>
        </div>
    </x-slot>
</x-layout.side-menu-tabs>
