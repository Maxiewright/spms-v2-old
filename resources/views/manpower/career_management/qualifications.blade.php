<x-layouts.side-menu-tabs sub-head="Career Management | Qualification" title="Qualification">
    <x-slot name="tabs">
        <a data-toggle="tab" data-target="#course-types" href="javascript:;"
           class="flex items-center active">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Course Types
        </a>
        <a data-toggle="tab" data-target="#course-institutions" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Course Institutions
        </a>
        <a data-toggle="tab" data-target="#courses" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Courses
        </a>
        <a data-toggle="tab" data-target="#course-qualifications" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Course Qualifications
        </a>
        <a data-toggle="tab" data-target="#education-levels" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Education Levels
        </a>
        <a data-toggle="tab" data-target="#subjects" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Subjects
        </a>
        <a data-toggle="tab" data-target="#school-types" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>School types | Districts
        </a>
        <a data-toggle="tab" data-target="#schools" href="javascript:;"
           class="flex items-center ">
            <i data-feather="activity" class="w-4 h-4 mr-2"></i>Schools
        </a>

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
            <livewire:manpower.career-management.qualification.education.school-district-component/>
        </div>
        <div class="tab-content__pane " id="schools">
            <livewire:manpower.career-management.qualification.education.school-component/>
        </div>
    </x-slot>
</x-layouts.side-menu-tabs>
